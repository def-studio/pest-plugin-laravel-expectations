<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-18 00:00:00')->toBeMidnight();
});

it('fails', function () {
    expect('2021-10-19 03:00:00')->toBeMidnight();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-19 03:00:00] is midnight');

it('passes negated', function () {
    expect('2021-10-19 03:00:00')->not->toBeMidnight();
});

it('fails negated', function () {
    expect('2021-10-18 00:00:00')->not->toBeMidnight();
})->throws(ExpectationFailedException::class);
