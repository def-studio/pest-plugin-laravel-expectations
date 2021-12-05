<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\SoftDeletableUser;

it('passes', function () {
    $user = SoftDeletableUser::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->toBeSoftDeleted();
});

it('fails', function () {
    $user = SoftDeletableUser::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->toBeSoftDeleted();
})->throws(ExpectationFailedException::class);

it('passes when negated', function () {
    $user = SoftDeletableUser::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->not->toBeSoftDeleted();
});

it('fails when negated', function () {
    $user = SoftDeletableUser::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->not->toBeSoftDeleted();
})->throws(ExpectationFailedException::class);
