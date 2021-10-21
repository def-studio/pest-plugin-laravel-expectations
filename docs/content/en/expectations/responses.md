---
title: Responses Expectations
menuTitle: Responses
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toBeSuccessful()`

Assert that the response has a successful status code.

```php
expect(get('/page'))->toBeSuccessful();
 ```

### `toBeOk()`

Assert that the response has a 200 status code.

```php
expect(get('/page'))->toBeOk();
 ```

### `toConfirmCreation()`

Assert that the response has a 201 status code.

```php
expect(post('/comment'))->toConfirmCreation();
 ```

### `toBeNotFound()`

Assert that the response has a not found status code.

```php
expect(get('/unknown'))->toBeNotFound();
 ```

### `toBeForbidden()`

Assert that the response has a forbidden status code.

```php
expect(get('/secret'))->toBeForbidden();
 ```

### `toBeUnauthorized()`

Assert that the response has an unauthorized status code.

```php
expect(get('/admin-area'))->toBeUnauthorized();
 ```

### `toHaveNoContent()`

Assert that the response has the given status code and no content.

```php
expect(post('/timer/ping'))->toHaveNoContent();
 ```

### `toBeRedirect()`

Assert that the response is a redirection.

```php
expect(get('/secret/location'))->toBeRedirect('/login');
 ```

### `toBeRedirectToSignedRoute()`

Assert whether the response is redirecting to a given signed route.

```php
expect(get('/secret/location'))->toBeRedirect('/login');
 ```

### `toBeDownload()`

Assert that the response offers a file download.

```php
expect(get('/reports/last.pdf'))->toBeDownload();
 ```

### `toHaveStatus()`

Assert that the response has the given status code.

```php
expect(post('/comment'))->toHaveStatus(201);
 ```

### `toHaveLocation()`

Assert that the current location header matches the given URI.

```php
expect(get('/secret'))->toHaveLocation('/login');
 ```

### `toHaveValid()`

Assert that the response doesn't have the given validation error keys.

```php
expect(post('/register'), ['email' => 'taylor@laravel.com'])->toHaveValid(['email']);
 ```

### `toHaveInvalid()`

Assert that the response has the given validation error keys.

```php
expect(post('/register'), ['email' => 'taylor'])->toHaveInvalid(['email' => 'invalid email']);
 ```

### `toHaveJson()`

Assert that the response is a superset of the given JSON.

```php
expect(get('/api/post/11'))->toHaveJson(['id' => 11]);
 ```

### `toHaveExactJson()`

Assert that the response has the exact given JSON.

```php
expect(get('/api/post/11'))->toHaveExactJson([
    'id' => 11,
    'title' => 'Test Post',
    'content' => "my content"
]);
 ```

### `toHaveJsonFragment()`

Assert that the response contains the given JSON fragment.

```php
expect(get('/api/post/11'))->toHaveJsonFragment([
        'tags' => ['hot', 'news']
]);
 ```

### `toHaveJsonPath()`

Assert that the expected value and type exists at the given path in the response.

```php
expect(get('/api/post/11'))->toHaveJsonPath('options.public', true);
 ```

### `toHaveJsonValidationErrors()`

Assert that the response has the given JSON validation errors.

```php
expect(post('/comments'))->toHaveJsonValidationErrors(['content' => 'content cannot be empty']);
 ```

### `toHaveJsonStructure()`

Assert that the response has a given JSON structure.

```php
expect(get('/api/post/11'))->toHaveJsonStructure(['options' => ['user']]);
 ```

### `toRender()`

Assert that the response contains the given string or array of strings.

```php
expect(get('/page'))->toRender('<h1>title</h1>');
 ```

### `toRenderInOrder()`

Assert that the response contains the given ordered sequence of strings.

```php
expect(get('/page'))->toRenderInOrder(['<h1>title</h1>', '<h3>section</h3>']);
 ```

### `toRenderText()`

Assert that the response contains the given string or array of strings in its text.

```php
expect(get('/page'))->toRender('title');
 ```

### `toRenderTextInOrder()`

Assert that the response contains the given ordered sequence of strings in its text.

```php
expect(get('/page'))->toRenderInOrder(['title', 'content'], escape: false);
 ```

### `toContainText()`

alias for [`toRenderText()`](expectations/responses#torendertext)

### `toContainTextInOrder()`

alias for [`toRenderTextInOrder()`](expectations/responses#torendertextinorder)