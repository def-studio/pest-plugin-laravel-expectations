<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with string values', function () {
    expect('2021-01-01 22:55:02')->toBeSameMinuteAs('2021-01-01 22:55:00');
});

it('passes with datetime values', function () {
    expect(new DateTime('2021-01-01 22:55:02'))->toBeSameMinuteAs(new DateTime('2021-01-01 22:55:00'));
});

it('passes with carbon values', function () {
    expect(Carbon::make('2021-01-01 22:55:02'))->toBeSameMinuteAs(Carbon::make('2021-01-01 22:55:00'));
});

it('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeSameMinuteAs(now());
})->throws(InvalidDataException::class, 'Cannot cast [Array (...)] to a Carbon\Carbon instance');

it('fails', function () {
    expect(new DateTime('2021-01-01 22:56:02'))->toBeSameMinuteAs(new DateTime('2021-01-01 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-01 22:56:02] is same minute as 2021-01-01 22:55:00');

it('passes negated', function () {
    expect(now()->subMinute())->not->toBeSameMinuteAs(now());
});

it('fails negated', function () {
    expect('2021-01-01 22:55:02')->not->toBeSameMinuteAs('2021-01-01 22:55:00');
})->throws(ExpectationFailedException::class);
