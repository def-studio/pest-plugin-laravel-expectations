<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with string values', function () {
    expect('2021-01-01 22:50:01')->toBeSameHourAs('2021-01-01 22:55:00');
});

it('passes with datetime values', function () {
    expect(new DateTime('2021-01-01 22:50:01'))->toBeSameHourAs(new DateTime('2021-01-01 22:55:00'));
});

it('passes with carbon values', function () {
    expect(Carbon::make('2021-01-01 22:50:01'))->toBeSameHourAs(Carbon::make('2021-01-01 22:55:00'));
});

it('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeSameHourAs(now());
})->throws(InvalidDataException::class, 'Cannot cast [Array (...)] to a Carbon\Carbon instance');

it('fails', function () {
    expect(new DateTime('2021-01-01 23:55:00'))->toBeSameHourAs(new DateTime('2021-01-01 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-01 23:55:00] is same hour as 2021-01-01 22:55:00');

it('passes negated', function () {
    expect(now()->addDay())->not->toBeSameHourAs(now());
});

it('fails negated', function () {
    expect('2021-01-01 22:50:01')->not->toBeSameHourAs('2021-01-01 22:55:00');
})->throws(ExpectationFailedException::class);
