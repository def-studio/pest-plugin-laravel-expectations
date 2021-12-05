<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function ($structure) {
    expect(get('json'))->toHaveJsonStructure($structure);
})->with([
    'without structure'              => null,
    'at root'                        => ['structure' => ['foo']],
    'nested'                         => ['structure' => ['foobar' => ['foobar_foo', 'foobar_bar']]],
    'wildcard (repeating structure)' => ['structure' => ['bars' => ['*' => ['bar', 'foo']]]],
    'wildcard (numeric keys)'        => ['structure' => ['numeric_keys' => ['*' => ['bar', 'foo']]]],
    'nested after wildcard'          => ['structure' => ['baz' => ['*' => ['foo', 'bar' => ['foo', 'bar']]]]],
]);

it('fails', function () {
    expect(get('json'))->toHaveJsonStructure(['foo' => ['bee']]);
})->throws(ExpectationFailedException::class, "Failed asserting that an array has the key 'bee'");

it('passes negated', function () {
    expect(get('json'))->not->toHaveJsonStructure(['foo' => ['bee']]);
});

it('fails negated', function () {
    expect(get('json'))->not->toHaveJsonStructure(['foo']);
})->throws(ExpectationFailedException::class);
