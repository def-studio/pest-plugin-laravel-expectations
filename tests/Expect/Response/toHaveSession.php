<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(get('/session'))->toHaveSession('foo', 'bar');
});

it('fails', function () {
    expect(get('/session'))->toHaveSession('foo', 'baz');
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are equal.');

it('passes negated', function () {
    expect(get('/session'))->not->toHaveSession('foo', 'baz');
});

it('fails negated', function () {
    expect(get('/session'))->not->toHaveSession('foo', 'bar');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to have session 'foo' 'bar'.");
