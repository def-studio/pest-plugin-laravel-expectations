<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

it('passes', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->toBeDeleted();
});

it('fails', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->toBeDeleted();
})->throws(ExpectationFailedException::class);

test('negated pas', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->not->toBeDeleted();
});

it('fails when negated', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->not->toBeDeleted();
})->throws(ExpectationFailedException::class);
