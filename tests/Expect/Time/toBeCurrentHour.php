<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now())->toBeCurrentHour();
});

it('fails', function () {
    expect(now()->subHour())->toBeCurrentHour();
})->throws(ExpectationFailedException::class);

it('passes negated', function () {
    expect(now()->subHour())->not->toBeCurrentHour();
});

it('fails negated', function () {
    expect(now())->not->toBeCurrentHour();
})->throws(ExpectationFailedException::class);
