<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with string values', function () {
    expect('2021-01-03 22:55:04')->toBeSameSecondAs('2021-01-03 22:55:04');
});

it('passes with datetime values', function () {
    expect(new DateTime('2021-01-03 22:55:04'))->toBeSameSecondAs(new DateTime('2021-01-03 22:55:04'));
});

it('passes with carbon values', function () {
    expect(Carbon::make('2021-01-03 22:55:04'))->toBeSameSecondAs(Carbon::make('2021-01-03 22:55:04'));
});

it('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeSameSecondAs(now());
})->throws(InvalidDataException::class, 'Cannot cast [Array (...)] to a Carbon\Carbon instance');

it('fails', function () {
    expect(new DateTime('2021-01-03 22:55:04'))->toBeSameSecondAs(new DateTime('2021-01-03 22:55:05'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-03 22:55:04] is same second as 2021-01-03 22:55:05');

it('passes negated', function () {
    expect(now()->subSecond())->not->toBeSameSecondAs(now());
});

it('fails negated', function () {
    expect('2021-01-03 22:55:04')->not->toBeSameSecondAs('2021-01-03 22:55:04');
})->throws(ExpectationFailedException::class);
