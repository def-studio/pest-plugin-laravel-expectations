<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with string values', function () {
    expect('2021-01-01')->toBeSameYearAs('2021-10-01 22:55:00');
});

it('passes with datetime values', function () {
    expect(new DateTime('2021-01-01'))->toBeSameYearAs(new DateTime('2021-10-01 22:55:00'));
});

it('passes with carbon values', function () {
    expect(Carbon::make('2021-01-01'))->toBeSameYearAs(Carbon::make('2021-10-01 22:55:00'));
});

it('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeSameYearAs(now());
})->throws(InvalidDataException::class, 'Cannot cast [Array (...)] to a Carbon\Carbon instance');

it('fails', function () {
    expect(new DateTime('2021-01-02'))->toBeSameYearAs(new DateTime('2022-01-01 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-02 00:00:00] is same year as 2022-01-01 22:55:00');

it('passes negated', function () {
    expect(now()->addYear())->not->toBeSameYearAs(now());
});

it('fails negated', function () {
    expect('2021-01-01')->not->toBeSameYearAs('2021-10-01 22:55:00');
})->throws(ExpectationFailedException::class);
