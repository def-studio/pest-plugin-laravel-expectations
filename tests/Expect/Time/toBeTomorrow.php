<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(now()->addDay())->toBeTomorrow();
});

it('fails', function () {
    expect('2999-01-01')->toBeTomorrow();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is tomorrow');

it('passes negated', function () {
    expect('2999-01-01')->not->toBeTomorrow();
});

it('fails negated', function () {
    expect(now()->addDay())->not->toBeTomorrow();
})->throws(ExpectationFailedException::class);
