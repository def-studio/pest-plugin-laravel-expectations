<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(get('json'))->toHaveJsonPath('foo.bar', 'baz');
});

it('fails with wrong expect value', function () {
    expect(get('json'))->toHaveJsonPath('foo.bar', 'quuz');
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are identical');

it('fails with wrong path', function () {
    expect(get('json'))->toHaveJsonPath('foo.baz', 'quuz');
})->throws(ExpectationFailedException::class, "Failed asserting that null is identical to 'quuz'");

it('passes negated', function () {
    expect(get('json'))->not->toHaveJsonPath('foo.bar', 'quuz');
});

it('fails negated', function () {
    expect(get('json'))->not->toHaveJsonPath('foo.bar', 'baz');
})->throws(ExpectationFailedException::class);
