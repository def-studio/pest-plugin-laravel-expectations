<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-18 00:00:00')->toBeStartOfDay();
});

it('fails', function () {
    expect('2021-10-19 03:00:00')->toBeStartOfDay();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-19 03:00:00] is start of day');

it('passes negated', function () {
    expect('2021-10-19 03:00:00')->not->toBeStartOfDay();
});

it('fails negated', function () {
    expect('2021-10-18 00:00:00')->not->toBeStartOfDay();
})->throws(ExpectationFailedException::class);
