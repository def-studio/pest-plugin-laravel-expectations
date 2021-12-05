<?php

use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(Collection::empty())->toBeEloquentCollection();
    expect('1, 2, 3')->not->toBeCollection();
});

it('fails', function () {
    expect(collect(['a', 'b', 'c']))->toBeEloquentCollection();
})->throws(ExpectationFailedException::class);

it('passes when negated', function () {
    expect(collect(['a', 'b', 'c']))->not->toBeEloquentCollection();
});

it('fails when negated', function () {
    expect(Collection::empty())->not->toBeEloquentCollection();
})->throws(ExpectationFailedException::class);
