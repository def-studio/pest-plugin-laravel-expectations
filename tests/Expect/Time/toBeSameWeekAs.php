<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with string values', function () {
    expect('2021-01-01')->toBeSameWeekAs('2021-01-03 22:55:00');
});

it('passes with datetime values', function () {
    expect(new DateTime('2021-01-01'))->toBeSameWeekAs(new DateTime('2021-01-03 22:55:00'));
});

it('passes with carbon values', function () {
    expect(Carbon::make('2021-01-01'))->toBeSameWeekAs(Carbon::make('2021-01-03 22:55:00'));
});

it('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeSameWeekAs(now());
})->throws(InvalidDataException::class, 'Cannot cast [Array (...)] to a Carbon\Carbon instance');

it('fails', function () {
    expect(new DateTime('2021-01-01'))->toBeSameWeekAs(new DateTime('2021-01-04 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-01 00:00:00] is same week as 2021-01-04 22:55:00');

it('passes negated', function () {
    expect(now()->addWeek())->not->toBeSameWeekAs(now());
});

it('fails negated', function () {
    expect('2021-01-01')->not->toBeSameWeekAs('2021-01-02 22:55:00');
})->throws(ExpectationFailedException::class);
