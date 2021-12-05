<?php

use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    Storage::put('testfile.txt', 'foo');

    expect('testfile.txt')->toExistInStorage();
});

it('passes with non default storage', function () {
    Storage::disk('secondary')->put('testfile.txt', 'foo');

    expect('testfile.txt')->toExistInStorage('secondary');
});

it('fails', function () {
    expect('testfile.txt')->toExistInStorage();
})->throws(ExpectationFailedException::class, "Failed asserting that testfile.txt exist in 'default' storage");

it('fails with non default storage', function () {
    Storage::put('testfile.txt', 'foo');
    expect('testfile.txt')->toExistInStorage('secondary');
})->throws(ExpectationFailedException::class, "Failed asserting that testfile.txt exist in 'secondary' storage");

it('passes negated', function () {
    expect('testfile.txt')->not->toExistInStorage();
});

it('passes negated with non default storage', function () {
    Storage::put('testfile.txt', 'foo');
    expect('testfile.txt')->not->toExistInStorage('secondary');
});

it('fails negated', function () {
    Storage::put('testfile.txt', 'foo');

    expect('testfile.txt')->toExistInStorage();

    expect('testfile.txt')->not->toExistInStorage();
})->throws(ExpectationFailedException::class, "Expecting 'testfile.txt' not to exist in storage");

it('fails negated non default storage', function () {
    Storage::disk('secondary')->put('testfile.txt', 'foo');

    expect('testfile.txt')->not->toExistInStorage('secondary');
})->throws(ExpectationFailedException::class, "Expecting 'testfile.txt' not to exist in storage 'secondary'");
