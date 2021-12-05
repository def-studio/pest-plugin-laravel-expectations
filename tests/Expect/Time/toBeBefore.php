<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with string values', function () {
    expect('2021-01-01')->toBeBefore('2021-01-02 22:55:00');
});

it('passes with datetime values', function () {
    expect(new DateTime('2021-01-01'))->toBeBefore(new DateTime('2021-01-02 22:55:00'));
});

it('passes with carbon values', function () {
    expect(Carbon::make('2021-01-01'))->toBeBefore(Carbon::make('2021-01-02 22:55:00'));
});

it('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeBefore(now());
})->throws(InvalidDataException::class, 'Cannot cast [Array (...)] to a Carbon\Carbon instance');

it('fails', function () {
    expect(new DateTime('2021-01-02'))->toBeBefore(new DateTime('2021-01-01 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-02 00:00:00] is before 2021-01-01 22:55:00');

it('passes negated', function () {
    expect('2021-01-03')->not->toBeBefore('2021-01-02 22:55:00');
});

it('fails negated', function () {
    expect('2021-01-01')->not->toBeBefore('2021-01-01 22:55:00');
})->throws(ExpectationFailedException::class);
