<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with string values', function () {
    expect('2021-01-05')->toBeSameMonthAs('2021-01-01 22:55:00');
});

it('passes with datetime values', function () {
    expect(new DateTime('2021-01-05'))->toBeSameMonthAs(new DateTime('2021-01-01 22:55:00'));
});

it('passes with carbon values', function () {
    expect(Carbon::make('2021-01-05'))->toBeSameMonthAs(Carbon::make('2021-01-01 22:55:00'));
});

it('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeSameMonthAs(now());
})->throws(InvalidDataException::class, 'Cannot cast [Array (...)] to a Carbon\Carbon instance');

it('fails', function () {
    expect(new DateTime('2021-02-02'))->toBeSameMonthAs(new DateTime('2021-01-01 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-02-02 00:00:00] is same month as 2021-01-01 22:55:00');

it('passes negated', function () {
    expect(now()->addMonth())->not->toBeSameMonthAs(now());
});

it('fails negated', function () {
    expect('2021-01-05')->not->toBeSameMonthAs('2021-01-01 22:55:00');
})->throws(ExpectationFailedException::class);
