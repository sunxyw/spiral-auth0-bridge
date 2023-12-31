# This is my package spiral-auth0-bridge

[![PHP Version Require](https://poser.pugx.org/sunxyw/spiral-auth0-bridge/require/php)](https://packagist.org/packages/sunxyw/spiral-auth0-bridge)
[![Latest Stable Version](https://poser.pugx.org/sunxyw/spiral-auth0-bridge/v/stable)](https://packagist.org/packages/sunxyw/spiral-auth0-bridge)
[![phpunit](https://github.com/sunxyw/spiral-auth0-bridge/actions/workflows/phpunit.yml/badge.svg)](https://github.com/sunxyw/spiral-auth0-bridge/actions)
[![psalm](https://github.com/sunxyw/spiral-auth0-bridge/actions/workflows/psalm.yml/badge.svg)](https://github.com/sunxyw/spiral-auth0-bridge/actions)
[![Codecov](https://codecov.io/gh/sunxyw/spiral-auth0-bridge/branch/master/graph/badge.svg)](https://codecov.io/gh/sunxyw/spiral-auth0-bridge/)
[![Total Downloads](https://poser.pugx.org/sunxyw/spiral-auth0-bridge/downloads)](https://packagist.org/sunxyw/spiral-auth0-bridge/phpunit)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Requirements

Make sure that your server is configured with following PHP version and extensions:

- PHP 8.1+
- Spiral framework 3.0+

## Installation

You can install the package via composer:

```bash
composer require sunxyw/spiral-auth0-bridge
```

After package install you need to register bootloader from the package.

```php
protected const LOAD = [
    // ...
    \Sunxyw\SpiralAuth0Bridge\Bootloader\Auth0BridgeBootloader::class,
];
```

> Note: if you are using [`spiral-packages/discoverer`](https://github.com/spiral-packages/discoverer),
> you don't need to register bootloader by yourself.

## Usage

Register the `\Sunxyw\SpiralAuth0Bridge\Security\Auth0TokenStorage` token storage via config or bootloader, you may find
documentation [here](https://spiral.dev/docs/security-authentication/current/en#custom-token-storage).

Then, register the actor provider `\Sunxyw\SpiralAuth0Bridge\Security\Auth0ActorProvider` via bootloader too,
documentation may
find [here](https://spiral.dev/docs/security-authentication/current/en#actor-provider-and-token-payload).

> You may want to scroll down the documentation page to find the registration steps.

Please remember to configure your AuthTransportMiddleware too, otherwise, Auth0 bridge will not able to retrieve the
token. [Docs](https://spiral.dev/docs/security-authentication/current/en#usage-with-http-layer).

After that, you can obtain the actor using `AuthContextInterface`.

```php
public function index(\Spiral\Auth\AuthContextInterface $auth)
{
    if ($auth->getActor() === null) {
        throw new ForbiddenException();
    }

    dump($auth->getActor());
}
```

The actor will be an instance of `\Sunxyw\SpiralAuth0Bridge\Security\Auth0Actor`.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sunxyw](https://github.com/sunxyw)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
