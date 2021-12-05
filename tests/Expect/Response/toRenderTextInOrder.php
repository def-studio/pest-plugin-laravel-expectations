<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

it('passes', function () {
    expect(get('/page'))
        ->toRenderTextInOrder(['title', 'section', 'content'])
        ->toContainTextInOrder(['title', 'section', 'content']);
});

it('fails', function () {
    expect(get('/page'))->toRenderTextInOrder(['title', 'content', 'section']);
})->throws(ExpectationFailedException::class);

it('passes when negated', function () {
    expect(get('/page'))
        ->not->toRenderTextInOrder(['title', 'content', 'section'])
        ->not->toContainTextInOrder(['title', 'content', 'section']);
});

it('fails when negated', function () {
    expect(get('/page'))->not->toRenderTextInOrder(['title', 'section', 'content']);
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to render text in order Array (...)");
