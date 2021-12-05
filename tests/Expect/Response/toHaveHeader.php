<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(get('/header'))->toHaveHeader('foo', 'bar');
});

it('fails', function () {
    expect(get('/header'))->toHaveHeader('foo', 'baz');
})->throws(ExpectationFailedException::class, 'Header [foo] was found, but value [bar] does not match [baz]');
it('fails without header', function () {
    expect(get('/ok'))->toHaveHeader('foo');
})->throws(ExpectationFailedException::class, 'Header [foo] not present on response');
it('passes negated', function () {
    expect(get('/header'))->not->toHaveHeader('foo', 'baz');
});

it('fails negated', function () {
    expect(get('/header'))->not->toHaveHeader('foo', 'bar');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to have header 'foo' 'bar'.");
