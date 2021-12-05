<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now())->toBeCurrentSecond();
});

it('fails', function () {
    expect(now()->subSecond())->toBeCurrentSecond();
})->throws(ExpectationFailedException::class);

it('passes negated', function () {
    expect(now()->subSecond())->not->toBeCurrentSecond();
});

it('fails negated', function () {
    expect(now())->not->toBeCurrentSecond();
})->throws(ExpectationFailedException::class);
