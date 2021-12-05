<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-22')->toBeFriday();
});

it('fails', function () {
    expect('2021-10-23')->toBeFriday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-23 00:00:00] is Friday');

it('passes negated', function () {
    expect('2021-10-23')->not->toBeFriday();
});

it('fails negated', function () {
    expect('2021-10-22')->not->toBeFriday();
})->throws(ExpectationFailedException::class);
