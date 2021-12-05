<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

it('passes', function () {
    expect([
        'email'    => 'email@test.xx',
        'password' => 'password',
    ])->toBeInvalidCredentials();
});

it('fails', function () {
    User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect([
        'email'    => 'email@test.xx',
        'password' => 'password',
    ])->toBeInvalidCredentials();
})->throws(ExpectationFailedException::class, 'The given credentials are valid');

it('passes when negated', function () {
    User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect([
        'email'    => 'email@test.xx',
        'password' => 'password',
    ])->not->toBeInvalidCredentials();
});

it('fails when negated', function () {
    expect([
        'email'    => 'email@test.xx',
        'password' => 'password',
    ])->not->toBeInvalidCredentials();
})->throws(ExpectationFailedException::class, 'Expecting Array (...) not to be invalid credentials');
