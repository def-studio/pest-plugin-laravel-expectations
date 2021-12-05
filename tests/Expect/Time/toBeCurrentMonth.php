<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now())->toBeCurrentMonth();
});

it('fails', function () {
    expect('2999-01-01')->toBeCurrentMonth();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the current month');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeCurrentMonth();
});

it('fails negated', function () {
    expect(now())->not->toBeCurrentMonth();
})->throws(ExpectationFailedException::class);
