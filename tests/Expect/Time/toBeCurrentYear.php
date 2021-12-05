<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now())->toBeCurrentYear();
});

it('fails', function () {
    expect('2999-01-01')->toBeCurrentYear();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the current year');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeCurrentYear();
});

it('fails negated', function () {
    expect(now())->not->toBeCurrentYear();
})->throws(ExpectationFailedException::class);
