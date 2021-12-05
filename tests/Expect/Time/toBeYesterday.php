<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now()->subDay())->toBeYesterday();
});

it('fails', function () {
    expect('2999-01-01')->toBeYesterday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is yesterday');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeYesterday();
});

it('fails negated', function () {
    expect(now()->subDay())->not->toBeYesterday();
})->throws(ExpectationFailedException::class);
