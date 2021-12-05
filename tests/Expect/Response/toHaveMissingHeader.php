<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(get('/header'))->toHaveMissingHeader('baz');
});

it('fails', function () {
    expect(get('/header'))->toHaveMissingHeader('foo');
})->throws(ExpectationFailedException::class, 'Unexpected header [foo] is present on response');

it('passes negated', function () {
    expect(get('/header'))->not->toHaveMissingHeader('foo');
});

it('fails negated', function () {
    expect(get('/header'))->not->toHaveMissingHeader('baz');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to have missing header 'baz'");
