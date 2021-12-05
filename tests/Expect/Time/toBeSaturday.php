<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-23')->toBeSaturday();
});

it('fails', function () {
    expect('2021-10-24')->toBeSaturday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-24 00:00:00] is Saturday');

it('passes negated', function () {
    expect('2021-10-24')->not->toBeSaturday();
});

it('fails negated', function () {
    expect('2021-10-23')->not->toBeSaturday();
})->throws(ExpectationFailedException::class);
