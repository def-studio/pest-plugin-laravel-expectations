<?php

use function Pest\Laravel\actingAs;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

it('passes', function () {
    $user = User::make([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    actingAs($user);

    expect($user)->toBeAuthenticated();
});

it('fails with guest', function () {
    $user = User::make([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->toBeAuthenticated();
})->throws(ExpectationFailedException::class, 'The user is not authenticated');

it('fails with wrong user', function () {
    $user1 = User::make([
        'id'       => 1,
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user2 = User::make([
        'id'       => 2,
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    actingAs($user1);

    expect($user2)->toBeAuthenticated();
})->throws(ExpectationFailedException::class, "The User ID #2 doesn't match authenticated User ID #1");

it('passes when negated with guest', function () {
    $user = User::make([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->not->toBeAuthenticated();
});

it('passes when negated with wrong user', function () {
    $user1 = User::make([
        'id'       => 1,
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user2 = User::make([
        'id'       => 2,
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    actingAs($user1);

    expect($user2)->not->toBeAuthenticated();
});

it('fails when negated', function () {
    $user = User::make([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    actingAs($user);

    expect($user)->not->toBeAuthenticated();
})->throws(ExpectationFailedException::class, "Expecting Tests\Models\User Object (...) not to be authenticated");
