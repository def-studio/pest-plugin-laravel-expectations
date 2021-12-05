<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-22')->toBeWeekday();
});

it('fails', function () {
    expect('2021-10-23')->toBeWeekday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-23 00:00:00] is a weekday');

it('passes negated', function () {
    expect('2021-10-23')->not->toBeWeekday();
});

it('fails negated', function () {
    expect('2021-10-22')->not->toBeWeekday();
})->throws(ExpectationFailedException::class);
