<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now()->subYear())->toBeLastYear();
});

it('fails', function () {
    expect('2999-01-01')->toBeLastYear();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the last year');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeLastYear();
});

it('fails negated', function () {
    expect(now()->subYear())->not->toBeLastYear();
})->throws(ExpectationFailedException::class);
