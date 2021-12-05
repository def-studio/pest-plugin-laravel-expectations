<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

it('passes with string values', function () {
    expect('2021-01-02')->toBeBetween('2021-01-01', '2021-01-03');
});

it('passes with datetime values', function () {
    expect(new DateTime('2021-01-02'))->toBeBetween(new DateTime('2021-01-01'), new DateTime('2021-01-03'));
});

it('passes with carbon values', function () {
    expect(Carbon::make('2021-01-02'))->toBeBetween(Carbon::make('2021-01-01'), Carbon::make('2021-01-03'));
});

it('passes including bounds', function () {
    expect(Carbon::make('2021-01-01'))->toBeBetween(Carbon::make('2021-01-01'), Carbon::make('2021-01-03'));
});

it('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeBetween(now(), now()->addDay());
})->throws(InvalidDataException::class, 'Cannot cast [Array (...)] to a Carbon\Carbon instance');

it('fails', function () {
    expect('2021-01-04')->toBeBetween('2021-01-01', '2021-01-03');
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-04 00:00:00] is between 2021-01-01 00:00:00 and 2021-01-03 00:00:00');

it('fails excluding bounds', function () {
    expect('2021-01-01')->toBeBetween('2021-01-01', '2021-01-03', false);
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-01 00:00:00] is between 2021-01-01 00:00:00 and 2021-01-03 00:00:00');

it('passes negated', function () {
    expect('2021-01-01')->not->toBeBetween('2021-01-01', '2021-01-03', false);
});

it('fails negated', function () {
    expect('2021-01-01')->not->toBeBetween('2021-01-01', '2021-01-03');
})->throws(ExpectationFailedException::class);
