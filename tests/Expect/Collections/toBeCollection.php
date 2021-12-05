<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(collect([1, 2, 3]))->toBeCollection();
    expect('1, 2, 3')->not->toBeCollection();
});

it('fails', function () {
    expect((object) [])->toBeCollection();
})->throws(ExpectationFailedException::class);

it('passes when negated', function () {
    expect((object) [])->not->toBeCollection();
});

it('fails when negated', function () {
    expect(collect(['a', 'b', 'c']))->not->toBeCollection();
})->throws(ExpectationFailedException::class);
