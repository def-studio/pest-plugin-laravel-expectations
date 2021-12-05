<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with string values', function () {
    expect('2021-01-01')->toBeSameDayAs('2021-01-01 22:55:00');
});

it('passes with datetime values', function () {
    expect(new DateTime('2021-01-01'))->toBeSameDayAs(new DateTime('2021-01-01 22:55:00'));
});

it('passes with carbon values', function () {
    expect(Carbon::make('2021-01-01'))->toBeSameDayAs(Carbon::make('2021-01-01 22:55:00'));
});

it('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeSameDayAs(now());
})->throws(InvalidDataException::class, 'Cannot cast [Array (...)] to a Carbon\Carbon instance');

it('fails', function () {
    expect(new DateTime('2021-01-02'))->toBeSameDayAs(new DateTime('2021-01-01 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-02 00:00:00] is same day as 2021-01-01 22:55:00');

it('passes negated', function () {
    expect(now()->addDay())->not->toBeSameDayAs(now());
});

it('fails negated', function () {
    expect('2021-01-01')->not->toBeSameDayAs('2021-01-01 22:55:00');
})->throws(ExpectationFailedException::class);
