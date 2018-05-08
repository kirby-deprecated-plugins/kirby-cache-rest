# Kirby Cache REST

![Version](https://img.shields.io/badge/version-0.1-blue.svg) ![License](https://img.shields.io/badge/license-MIT-green.svg) [![Donate](https://img.shields.io/badge/give-donation-yellow.svg)](https://www.paypal.me/DevoneraAB)

Cache operations made developer friendly, in Kirby CMS.

Just visit an url to make a cache operation, for example `/flush`. You will get a JSON response back. It's simple for both users and computers to read the results.

## Table of contents

- [Installation instructions](docs/install.md)
- [Operations](#operations)
- [Additional options](#additional-options)
- [Changelog](docs/changelog.md)

## Operations

### Flush

**Url:** `/flush`

This operation flushes both `cache` and `thumbs` by default. You can change it to flush any folder.

**Path**

To flush the cache you by default need to visit `/flush`. It can be changed to a path that you prefer.

```php
c::set('cache.rest.flush.path', 'flush');
```

**Roots**

```php
global $kirby;
c::set('cache.rest.flush.roots', [
    $kirby->roots()->cache(),
    $kirby->roots()->thumbs()
]);
```

## Additional options

### lock

When lock is enabled, the operations will only be accessible by users logged in to the panel.

```php
c::set('cache.rest.flush.lock', false);
```

## Requirements

- [**Kirby**](https://getkirby.com/) 2.5+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/jenstornell/kirby-cache-rest/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Credits

- [Jens Törnell](https://github.com/jenstornell)