<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response1 = get('/staff-only');

    expect($response1)->toBeUnauthorized();

    $response2 = get('/staff-only?pin=1337');

    expect($response2)->toBeSuccessful()->not->toBeUnauthorized();
});

it('fails', function () {
    $response = get('/ok');

    expect($response)->toBeUnauthorized();
})->throws(ExpectationFailedException::class, 'Expected response status code [401] but received 200');

it('passes with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeUnauthorized();
});

it('fails with negation', function () {
    $response = get('/staff-only');

    expect($response)->not->toBeUnauthorized();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be unauthorized");
