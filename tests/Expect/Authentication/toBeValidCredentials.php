<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

it('passes', function () {
    User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect([
        'email'    => 'email@test.xx',
        'password' => 'password',
    ])->toBeValidCredentials();
});

it('fails', function () {
    expect([
        'email'    => 'wrong-email@test.xx',
        'password' => 'passwords',
    ])->toBeValidCredentials();
})->throws(ExpectationFailedException::class, 'The given credentials are invalid');

it('passes when negated', function () {
    expect([
        'email'    => 'wrong-email@test.xx',
        'password' => 'passwords',
    ])->not->toBeValidCredentials();
});

it('fails when negated', function () {
    User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect([
        'email'    => 'email@test.xx',
        'password' => 'password',
    ])->not->toBeValidCredentials();
})->throws(ExpectationFailedException::class, 'Expecting Array (...) not to be valid credentials');
