<?php

use Illuminate\Http\Response;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response = build_response(function (Response $response) {
        $response->header('Location', '/foo');
    });

    expect($response)->toHaveLocation('/foo');
});

it('fails', function () {
    $response = build_response(function (Response $response) {
        $response->header('Location', '/foo');
    });

    expect($response)->toHaveLocation('/bar');
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are equal');

it('passes with negation', function () {
    $response = build_response(function (Response $response) {
        $response->header('Location', '/foo');
    });

    expect($response)->not->toHaveLocation('/bar');
});

it('fails with negation', function () {
    $response = build_response(function (Response $response) {
        $response->header('Location', '/foo');
    });

    expect($response)->not->toHaveLocation('/foo');
})->throws(ExpectationFailedException::class);
