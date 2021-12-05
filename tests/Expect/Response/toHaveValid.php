<?php

use Illuminate\Testing\TestResponse;
use function Pest\Laravel\post;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response = post('/validate', ['email' => 'taylor@laravel.com']);

    if (!method_exists(TestResponse::class, 'assertValid')) {
        expect($response)->toBeOk();

        return;
    }

    expect($response)->toHaveValid(['email']);
});

it('fails', function () {
    $response = post('/validate', ['email' => 'taylor']);

    if (!method_exists(TestResponse::class, 'assertValid')) {
        throw new ExpectationFailedException("Found unexpected validation error for key: 'email'");
    }

    expect($response)->toHaveValid(['email']);
})->throws(ExpectationFailedException::class, "Found unexpected validation error for key: 'email'");

it('passes with negation', function () {
    $response = post('/validate');

    if (!method_exists(TestResponse::class, 'assertValid')) {
        expect($response)->not->toBeOk();

        return;
    }

    expect($response)->not->toHaveValid(['email']);
});

it('fails with negation', function () {
    $response = post('/validate', ['email' => 'taylor@laravel.com']);

    if (!method_exists(TestResponse::class, 'assertValid')) {
        throw new ExpectationFailedException('Expecting Illuminate\Testing\TestResponse Object (...) not to have valid Array (...)');
    }

    expect($response)->not->toHaveValid(['email']);
})->throws(ExpectationFailedException::class, 'Expecting Illuminate\Testing\TestResponse Object (...) not to have valid Array (...)');
