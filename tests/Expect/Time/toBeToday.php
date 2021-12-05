<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now())->toBeToday();
});

it('fails', function () {
    expect('2999-01-01')->toBeToday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is today');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeToday();
});

it('fails negated', function () {
    expect(now())->not->toBeToday();
})->throws(ExpectationFailedException::class);
