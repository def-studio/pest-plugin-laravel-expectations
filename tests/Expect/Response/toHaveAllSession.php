<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with only values', function () {
    expect(get('/session/all'))->toHaveAllSession([
        'foo',
        'baz',
    ]);
});

it('passes with keys and values', function () {
    expect(get('/session/all'))->toHaveAllSession([
        'foo' => 'bar',
        'baz' => 'biz',
    ]);
});

it('fails with only values', function () {
    expect(get('/session/all'))->toHaveAllSession([
        'not-in-session',
    ]);
})->throws(ExpectationFailedException::class, 'Session is missing expected key [not-in-session].');

it('fails with keys and values', function () {
    expect(get('/session/all'))->toHaveAllSession([
        'foo' => 'not-the-value',
    ]);
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are equal.');
