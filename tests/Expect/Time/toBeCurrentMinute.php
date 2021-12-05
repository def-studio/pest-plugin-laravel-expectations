<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now())->toBeCurrentMinute();
});

it('fails', function () {
    expect(now()->subMinute())->toBeCurrentMinute();
})->throws(ExpectationFailedException::class);

it('passes negated', function () {
    expect(now()->subMinute())->not->toBeCurrentMinute();
});

it('fails negated', function () {
    expect(now())->not->toBeCurrentMinute();
})->throws(ExpectationFailedException::class);
