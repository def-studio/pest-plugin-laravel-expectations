<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response = get('/redirect');

    expect($response)->toBeRedirect();
});

it('passes with uri check', function () {
    $response = get('/redirect');

    expect($response)->toBeRedirect('/ok');
});

it('fails', function () {
    $response = get('/ok');

    expect($response)->toBeRedirect();
})->throws(ExpectationFailedException::class, 'Response status code [200] is not a redirect status code');

it('fails with uri check', function () {
    $response = get('/redirect/out');

    expect($response)->toBeRedirect('/ok');
})->throws(ExpectationFailedException::class, 'Failed asserting that the redirect uri [https://www.google.it] matches [/ok]');

it('passes with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeRedirect();
});

it('fails with negation', function () {
    $response = get('/redirect');

    expect($response)->not->toBeRedirect();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be redirect");
