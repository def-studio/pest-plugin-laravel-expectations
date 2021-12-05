<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-21')->toBeThursday();
});

it('fails', function () {
    expect('2021-10-22')->toBeThursday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-22 00:00:00] is Thursday');

it('passes negated', function () {
    expect('2021-10-22')->not->toBeThursday();
});

it('fails negated', function () {
    expect('2021-10-21')->not->toBeThursday();
})->throws(ExpectationFailedException::class);
