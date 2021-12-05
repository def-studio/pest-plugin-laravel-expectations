<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-18')->toBeMonday();
});

it('fails', function () {
    expect('2021-10-19')->toBeMonday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-19 00:00:00] is Monday');

it('passes negated', function () {
    expect('2021-10-19')->not->toBeMonday();
});

it('fails negated', function () {
    expect('2021-10-18')->not->toBeMonday();
})->throws(ExpectationFailedException::class);
