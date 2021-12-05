<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

it('passes', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect(['id' => $user->id])->toBeInDatabase('users');
    expect(['name' => 'test user'])->toBeInDatabase('users');
    expect(['email' => 'email@test.xx'])->toBeInDatabase('users');
});

it('fails', function () {
    expect(['id' => 1])->toBeInDatabase('users');
})->throws(ExpectationFailedException::class);

it('passes when negated', function () {
    expect(['id' => 1])->not->toBeInDatabase('users');
});

it('fails when negated', function () {
    User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect(['id' => 1])->not->toBeInDatabase('users');
})->throws(ExpectationFailedException::class);
