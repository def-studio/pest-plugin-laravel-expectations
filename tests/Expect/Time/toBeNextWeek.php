<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now()->addWeek())->toBeNextWeek();
});

it('fails', function () {
    expect('2999-01-01')->toBeNextWeek();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the next week');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeNextWeek();
});

it('fails negated', function () {
    expect(now()->addWeek())->not->toBeNextWeek();
})->throws(ExpectationFailedException::class);
