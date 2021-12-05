<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now()->subMonth())->toBeLastMonth();
});

it('fails', function () {
    expect('2999-01-01')->toBeLastMonth();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the last month');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeLastMonth();
});

it('fails negated', function () {
    expect(now()->subMonth())->not->toBeLastMonth();
})->throws(ExpectationFailedException::class);
