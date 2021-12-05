<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now()->subHour())->toBePast();
});

it('fails', function () {
    expect('2999-01-01')->toBePast();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the past');

it('passes negated', function () {
    expect(now()->addHour())->not->toBePast();
});

it('fails negated', function () {
    expect(now()->subHour())->not->toBePast();
})->throws(ExpectationFailedException::class);
