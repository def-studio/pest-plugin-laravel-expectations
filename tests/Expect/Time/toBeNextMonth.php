<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now()->addMonth())->toBeNextMonth();
});

it('fails', function () {
    expect(now())->toBeNextMonth();
})->throws(ExpectationFailedException::class);

it('passes negated', function () {
    expect(now())->not->toBeNextMonth();
});

it('fails negated', function () {
    expect(now()->addMonth())->not->toBeNextMonth();
})->throws(ExpectationFailedException::class);
