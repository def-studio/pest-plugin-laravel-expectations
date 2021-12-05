<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-18 23:59:59')->toBeEndOfDay();
});

it('fails', function () {
    expect('2021-10-19')->toBeEndOfDay();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-19 00:00:00] is end of day');

it('passes negated', function () {
    expect('2021-10-19')->not->toBeEndOfDay();
});

it('fails negated', function () {
    expect('2021-10-18 23:59:59')->not->toBeEndOfDay();
})->throws(ExpectationFailedException::class);
