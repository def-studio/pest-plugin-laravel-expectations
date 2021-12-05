<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response = get('/no-content');

    expect($response)->toHaveNoContent();
});

it('passes with custom status', function () {
    $response = get('/ok');

    expect($response)->toHaveNoContent(200);
});

it('fails', function () {
    $response = get('/page');

    expect($response)->toHaveNoContent();
})->throws(ExpectationFailedException::class, 'Expected response status code [204] but received 200');

it('fails with a no content yet not custom status', function () {
    $response = get('/no-content');

    expect($response)->toHaveNoContent(205);
})->throws(ExpectationFailedException::class, 'Expected response status code [205] but received 204');

it('passes with negation', function () {
    $response = get('/page');

    expect($response)->not->toHaveNoContent();
});

it('fails with negation', function () {
    $response = get('/status/204');

    expect($response)->not->toHaveNoContent();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to have no content");
