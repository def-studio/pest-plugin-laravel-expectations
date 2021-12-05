<?php

use Illuminate\Testing\TestResponse;
use function Pest\Laravel\post;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response = post('/validate', ['email' => 'taylor']);

    if (!method_exists(TestResponse::class, 'assertValid')) {
        expect($response)->toBeRedirect();

        return;
    }

    expect($response)->toHaveInvalid(['email']);
});

it('fails', function () {
    $response = post('/validate', ['email' => 'taylor@laravel.com']);

    if (!method_exists(TestResponse::class, 'assertValid')) {
        throw new ExpectationFailedException('Session is missing expected key [errors]');
    }

    expect($response)->toHaveInvalid(['email']);
})->throws(ExpectationFailedException::class, 'Session is missing expected key [errors]');

it('passes with negation', function () {
    $response = post('/validate', ['email' => 'taylor@laravel.com']);

    if (!method_exists(TestResponse::class, 'assertValid')) {
        expect($response)->not->toBeRedirect();

        return;
    }

    expect($response)->not->toHaveInvalid(['email']);
});

it('fails with negation', function () {
    $response = post('/validate');

    if (!method_exists(TestResponse::class, 'assertValid')) {
        throw new ExpectationFailedException('Expecting Illuminate\Testing\TestResponse Object (...) not to have invalid Array (...)');
    }

    expect($response)->not->toHaveInvalid(['email']);
})->throws(ExpectationFailedException::class, 'Expecting Illuminate\Testing\TestResponse Object (...) not to have invalid Array (...)');
