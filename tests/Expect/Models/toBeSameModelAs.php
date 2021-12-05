<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

it('passes', function () {
    $user_1 = User::create([
        'name'     => 'first user',
        'email'    => '1@test.xx',
        'password' => 'password',
    ]);

    $user_2 = User::find(1);

    expect($user_1)->toBeSameModelAs($user_2);
});

it('fails', function () {
    $user_1 = User::create([
        'name'     => 'first user',
        'email'    => '1@test.xx',
        'password' => 'password',
    ]);

    $user_2 = User::create([
        'name'     => 'second user',
        'email'    => '2@test.xx',
        'password' => 'password',
    ]);

    expect($user_1)->toBeSameModelAs($user_2);
})->throws(ExpectationFailedException::class, 'Failed asserting that two models have the same ID and belongs to the same table');

it('passes when negated', function () {
    $user_1 = User::create([
        'name'     => 'first user',
        'email'    => '1@test.xx',
        'password' => 'password',
    ]);

    $user_2 = User::create([
        'name'     => 'second user',
        'email'    => '2@test.xx',
        'password' => 'password',
    ]);

    expect($user_1)->not->toBeSameModelAs($user_2);
});

it('fails when negated', function () {
    $user_1 = User::create([
        'name'     => 'first user',
        'email'    => '1@test.xx',
        'password' => 'password',
    ]);

    $user_2 = User::find(1);

    expect($user_1)->not->toBeSameModelAs($user_2);
})->throws(ExpectationFailedException::class);
