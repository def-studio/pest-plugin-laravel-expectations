<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('2021-10-18 12:00:00')->toBeMidday();
});

it('fails', function () {
    expect('2021-10-19')->toBeMidday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-19 00:00:00] is midday');

it('passes negated', function () {
    expect('2021-10-19')->not->toBeMidday();
});

it('fails negated', function () {
    expect('2021-10-18 12:00:00')->not->toBeMidday();
})->throws(ExpectationFailedException::class);
