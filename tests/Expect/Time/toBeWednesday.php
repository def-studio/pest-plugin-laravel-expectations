<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-20')->toBeWednesday();
});

it('fails', function () {
    expect('2021-10-21')->toBeWednesday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-21 00:00:00] is Wednesday');

it('passes negated', function () {
    expect('2021-10-21')->not->toBeWednesday();
});

it('fails negated', function () {
    expect('2021-10-20')->not->toBeWednesday();
})->throws(ExpectationFailedException::class);
