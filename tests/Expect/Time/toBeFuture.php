<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now()->addHour())->toBeFuture();
});

it('fails', function () {
    expect('1950-01-01')->toBeFuture();
})->throws(ExpectationFailedException::class, 'Failed to assert that [1950-01-01 00:00:00] is in the future');

it('passes negated', function () {
    expect(now())->not->toBeFuture();
});

it('fails negated', function () {
    expect(now()->addHour())->not->toBeFuture();
})->throws(ExpectationFailedException::class);
