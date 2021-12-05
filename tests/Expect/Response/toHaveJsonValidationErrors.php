<?php

use Illuminate\Http\Response;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors('foo');
});

it('passes with validation error message', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors(['foo' => 'oops']);
});

it('passes with validation partial error message', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops! oh no!'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors(['foo' => 'oops']);
});

it('passes with array', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'one', 'bar' => 'two'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors(['foo', 'bar']);
});

it('passes with custom errors key', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'data'   => ['foo' => 'oops'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors('foo', 'data');
});

it('fails', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors('bar');
})->throws(ExpectationFailedException::class, "Failed to find a validation error in the response for key: 'bar'");

it('fails with wrong message', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors(['foo' => 'damn']);
})->throws(AssertionFailedError::class, "Failed to find a validation error in the response for key and message: 'foo' => 'damn'");

it('fails without errors', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
        ]));
    });

    expect($response)->toHaveJsonValidationErrors('bar');
})->throws(ExpectationFailedException::class, "Failed to find a validation error in the response for key: 'bar'");

it('passes negated', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->not->toHaveJsonValidationErrors('bar');
});

it('fails negated', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->not->toHaveJsonValidationErrors('foo');
})->throws(ExpectationFailedException::class);
