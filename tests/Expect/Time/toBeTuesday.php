<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-19')->toBeTuesday();
});

it('fails', function () {
    expect('2021-10-20')->toBeTuesday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-20 00:00:00] is Tuesday');

it('passes negated', function () {
    expect('2021-10-20')->not->toBeTuesday();
});

it('fails negated', function () {
    expect('2021-10-19')->not->toBeTuesday();
})->throws(ExpectationFailedException::class);
