<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-23')->toBeWeekend();
});

it('fails', function () {
    expect('2021-10-22')->toBeWeekend();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-22 00:00:00] is Saturday or Sunday');

it('passes negated', function () {
    expect('2021-10-22')->not->toBeWeekend();
});

it('fails negated', function () {
    expect('2021-10-23')->not->toBeWeekend();
})->throws(ExpectationFailedException::class);
