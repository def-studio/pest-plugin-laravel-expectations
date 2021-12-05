<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;
use Symfony\Component\HttpFoundation\Response;

it('passes', function () {
    $response = get('/ok');

    expect($response)->toBeSuccessful();
});

it('passes with all success statuses', function ($status) {
    $response = get("/status/$status");

    expect($response)->toBeSuccessful();
})->with([
    Response::HTTP_OK,
    Response::HTTP_CREATED,
    Response::HTTP_ACCEPTED,
    Response::HTTP_NON_AUTHORITATIVE_INFORMATION,
    Response::HTTP_NO_CONTENT,
    Response::HTTP_RESET_CONTENT,
    Response::HTTP_PARTIAL_CONTENT,
    Response::HTTP_MULTI_STATUS,
    Response::HTTP_ALREADY_REPORTED,
    Response::HTTP_IM_USED,
]);

it('fails', function () {
    $response = get('/redirect');

    expect($response)->toBeSuccessful();
})->throws(ExpectationFailedException::class, 'Expected response status code [>=200, <300] but received 302');

it('passes with negation', function () {
    $response = get('/redirect');

    expect($response)->not->toBeSuccessful();
});

it('fails with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeSuccessful();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be successful");
