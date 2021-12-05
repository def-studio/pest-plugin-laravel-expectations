<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now())->toBeCurrentDay();
});

it('fails', function () {
    expect('2999-01-01')->toBeCurrentDay();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is today');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeCurrentDay();
});

it('fails negated', function () {
    expect(now())->not->toBeCurrentDay();
})->throws(ExpectationFailedException::class);
