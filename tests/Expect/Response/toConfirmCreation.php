<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response = get('/status/201');

    expect($response)->toConfirmCreation();
});

it('fails', function () {
    $response = get('/redirect');

    expect($response)->toConfirmCreation();
})->throws(ExpectationFailedException::class, 'Expected response status code [201] but received 302');

it('passes with negation', function () {
    $response = get('/redirect');

    expect($response)->not->toConfirmCreation();
});

it('fails with negation', function () {
    $response = get('/status/201');

    expect($response)->not->toConfirmCreation();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to confirm creation");
