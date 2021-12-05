<?php

use Illuminate\Support\Facades\Gate;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\Post;
use Tests\Models\User;

it('passes with single argument', function () {
    $user = User::make(['id' => 1]);
    $post = Post::make(['user_id' => 1]);

    Gate::define('edit', function (User $user, Post $post) {
        return $user->id == $post->user_id;
    });

    expect($user)->toBeAbleTo('edit', $post);
});

it('passes with multiple arguments', function () {
    $user = User::make(['id' => 1]);
    $post_1 = Post::make(['user_id' => 1]);
    $post_2 = Post::make(['user_id' => 1]);

    Gate::define('merge', function (User $user, Post $post_1, Post $post_2) {
        return $user->id == $post_1->user_id && $user->id == $post_2->user_id;
    });

    expect($user)->toBeAbleTo('merge', [$post_1, $post_2]);
});

it('fails', function () {
    $user = User::make(['id' => 1]);
    $post = Post::make(['user_id' => 2]);

    Gate::define('edit', function (User $user, Post $post) {
        return $user->id == $post->user_id;
    });

    expect($user)->toBeAbleTo('edit', $post);
})->throws(ExpectationFailedException::class, 'Failed asserting that the given user is authorized to "edit" with [Tests\Models\Post Object (...)]');

it('passes when negated', function () {
    $user = User::make(['id' => 1]);
    $post = Post::make(['user_id' => 2]);

    Gate::define('edit', function (User $user, Post $post) {
        return $user->id == $post->user_id;
    });

    expect($user)->not->toBeAbleTo('edit', $post);
});

it('fails when negated', function () {
    $user = User::make(['id' => 1]);
    $post = Post::make(['user_id' => 1]);

    Gate::define('edit', function (User $user, Post $post) {
        return $user->id == $post->user_id;
    });

    expect($user)->not->toBeAbleTo('edit', [$post]);
})->throws(ExpectationFailedException::class, "Expecting Tests\Models\User Object (...) not to be able to 'edit' Array (...)");
