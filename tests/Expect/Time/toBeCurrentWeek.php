<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now())->toBeCurrentWeek();
});

it('fails', function () {
    expect('2999-01-01')->toBeCurrentWeek();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the current week');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeCurrentWeek();
});

it('fails negated', function () {
    expect(now())->not->toBeCurrentWeek();
})->throws(ExpectationFailedException::class);
