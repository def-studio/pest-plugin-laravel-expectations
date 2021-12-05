<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now()->addYear())->toBeNextYear();
});

it('fails', function () {
    expect('2999-01-01')->toBeNextYear();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the next year');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeNextYear();
});

it('fails negated', function () {
    expect(now()->addYear())->not->toBeNextYear();
})->throws(ExpectationFailedException::class);
