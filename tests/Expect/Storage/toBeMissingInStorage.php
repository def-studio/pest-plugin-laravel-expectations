<?php

use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect('testfile.txt')->toBeMissingInStorage();
});

it('passes with non default storage', function () {
    Storage::put('testfile.txt', 'foo');

    expect('testfile.txt')->toBeMissingInStorage('secondary');
});

it('fails', function () {
    Storage::put('testfile.txt', 'foo');

    expect('testfile.txt')->toBeMissingInStorage();
})->throws(ExpectationFailedException::class, "Failed asserting that testfile.txt is missing in 'default' storage");

it('fails with non default storage', function () {
    Storage::disk('secondary')->put('testfile.txt', 'foo');

    expect('testfile.txt')->toBeMissingInStorage('secondary');
})->throws(ExpectationFailedException::class, "Failed asserting that testfile.txt is missing in 'secondary' storage");

it('passes negated', function () {
    Storage::put('testfile.txt', 'foo');

    expect('testfile.txt')->not->toBeMissingInStorage();
});

it('passes negated with non default storage', function () {
    Storage::disk('secondary')->put('testfile.txt', 'foo');

    expect('testfile.txt')->not->toBeMissingInStorage('secondary');
});

it('fails negated', function () {
    expect('testfile.txt')->not->toBeMissingInStorage();
})->throws(ExpectationFailedException::class, "Expecting 'testfile.txt' not to be missing in storage");

it('fails negated non default storage', function () {
    expect('testfile.txt')->not->toBeMissingInStorage('secondary');
})->throws(ExpectationFailedException::class, "Expecting 'testfile.txt' not to be missing in storage 'secondary'");
