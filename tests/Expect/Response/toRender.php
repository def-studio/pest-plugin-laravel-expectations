<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(get('/page'))->toRender('<h1>title</h1>');
});

it('passes with two values', function () {
    expect(get('/page'))->toRender(['<h3>section</h3>', '<h1>title</h1>']);
});

it('fails', function () {
    expect(get('/page'))->toRender('<h1>foo</h1>');
})->throws(ExpectationFailedException::class);

it('passes when negated', function () {
    expect(get('/page'))->not->toRender('<h1>foo</h1>');
});

it('fails when negated', function () {
    expect(get('/page'))->not->toRender('<h1>title</h1>');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to render '<h1>title</h1>'");
