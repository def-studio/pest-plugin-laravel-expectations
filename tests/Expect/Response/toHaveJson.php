<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(get('json'))->toHaveJson(['foo' => ['bar' => 'baz']]);
});

it('passes strict', function () {
    expect(get('json'))->toHaveJson(['qux'  => 1], true);
});

it('fails', function () {
    expect(get('json'))->toHaveJson(['foo' => ['bar' => 'foo']]);
})->throws(ExpectationFailedException::class, 'Unable to find JSON');

it('fails strict', function () {
    expect(get('json'))->toHaveJson(['qux'  => '1'], true);
})->throws(ExpectationFailedException::class, 'Unable to find JSON');

it('passes negated', function () {
    expect(get('json'))->not->toHaveJson(['foo' => ['bar' => 'foo']]);
});

it('fails negated', function () {
    expect(get('json'))->not->toHaveJson(['foo' => ['bar' => 'baz']]);
})->throws(ExpectationFailedException::class);
