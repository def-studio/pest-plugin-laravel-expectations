<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now()->subWeek())->toBeLastWeek();
});

it('fails', function () {
    expect('2999-01-01')->toBeLastWeek();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the last week');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeLastWeek();
});

it('fails negated', function () {
    expect(now()->subWeek())->not->toBeLastWeek();
})->throws(ExpectationFailedException::class);
