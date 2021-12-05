<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with string values', function () {
    expect('2021-01-02')->toBeAfter('2021-01-01 22:55:00');
});

it('passes with datetime values', function () {
    expect(new DateTime('2021-01-02'))->toBeAfter(new DateTime('2021-01-01 22:55:00'));
});

it('passes with carbon values', function () {
    expect(Carbon::make('2021-01-02'))->toBeAfter(Carbon::make('2021-01-01 22:55:00'));
});

it('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeAfter(now());
})->throws(InvalidDataException::class, 'Cannot cast [Array (...)] to a Carbon\Carbon instance');

it('fails', function () {
    expect(new DateTime('2021-01-01'))->toBeAfter(new DateTime('2021-01-01 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-01 00:00:00] is after 2021-01-01 22:55:00');

it('passes negated', function () {
    expect(now())->not->toBeAfter(now()->addHour());
});

it('fails negated', function () {
    expect('2021-01-02')->not->toBeAfter('2021-01-01 22:55:00');
})->throws(ExpectationFailedException::class);
