<?php

use Illuminate\Http\Response;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response = build_response(function (Response $response) {
        $response->setStatusCode(403);
    });

    expect($response)->toBeForbidden();
});

it('fails', function () {
    $response = build_response(function (Response $response) {
        $response->setStatusCode(200);
    });

    expect($response)->toBeForbidden();
})->throws(ExpectationFailedException::class, 'Expected response status code [403] but received 200');

it('passes with negation', function () {
    $response = build_response(function (Response $response) {
        $response->setStatusCode(201);
    });

    expect($response)->not->toBeForbidden();
});

it('fails with negation', function () {
    $response = build_response(function (Response $response) {
        $response->setStatusCode(403);
    });

    expect($response)->not->toBeForbidden();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be forbidden");
