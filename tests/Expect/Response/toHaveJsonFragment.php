<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(get('json'))->toHaveJsonFragment(['bar' => 'baz']);
});

it('fails', function () {
    expect(get('json'))->toHaveJsonFragment(['bar' => 'foo']);
})->throws(ExpectationFailedException::class, 'Unable to find JSON');

it('passes negated', function () {
    expect(get('json'))->not->toHaveJsonFragment(['bar' => 'foo']);
});

it('fails negated', function () {
    expect(get('json'))->not->toHaveJsonFragment(['bar' => 'baz']);
})->throws(ExpectationFailedException::class);
