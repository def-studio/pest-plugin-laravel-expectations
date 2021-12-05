<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response = get('/ok');

    expect($response)->toBeOk();
});

it('passes with simple response', function () {
    $response = response()->noContent(200);

    expect($response)->toBeOk();
});

it('fails', function () {
    $response = get('/redirect');

    expect($response)->toBeOk();
})->throws(ExpectationFailedException::class, 'Expected response status code [200] but received 302');

it('fails with a successful yet not 200 status', function () {
    $response = get('/status/203');

    expect($response)->toBeOk();
})->throws(ExpectationFailedException::class, 'Expected response status code [200] but received 203');

it('passes with negation', function () {
    $response = get('/redirect');

    expect($response)->not->toBeOk();
});

it('fails with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeOk();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be ok");
