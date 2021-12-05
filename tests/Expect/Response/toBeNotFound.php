<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response = get('/unknown');

    expect($response)->toBeNotFound();
});

it('fails', function () {
    $response = get('/redirect');

    expect($response)->toBeNotFound();
})->throws(ExpectationFailedException::class, 'Expected response status code [404] but received 302');

it('passes with negation', function () {
    $response = get('/redirect');

    expect($response)->not->toBeNotFound();
});

it('fails with negation', function () {
    $response = get('/unknown');

    expect($response)->not->toBeNotFound();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be not found");
