<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-24')->toBeSunday();
});

it('fails', function () {
    expect('2021-10-25')->toBeSunday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-25 00:00:00] is Sunday');

it('passes negated', function () {
    expect('2021-10-25')->not->toBeSunday();
});

it('fails negated', function () {
    expect('2021-10-24')->not->toBeSunday();
})->throws(ExpectationFailedException::class);
