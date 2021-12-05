<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(get('/page'))
        ->toRenderText('content with bold text')
        ->toContainText('content with bold text');
});

it('passes with two values', function () {
    expect(get('/page'))
        ->toRenderText(['section', 'title'])
        ->toContainText(['section', 'title']);
});

it('fails', function () {
    expect(get('/page'))->toRenderText('foo');
})->throws(ExpectationFailedException::class);

it('passes when negated', function () {
    expect(get('/page'))
        ->not->toRenderText('foo')
        ->not->toContainText('foo');
});

it('fails when negated', function () {
    expect(get('/page'))->not->toRenderText('title');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to render text 'title'");
