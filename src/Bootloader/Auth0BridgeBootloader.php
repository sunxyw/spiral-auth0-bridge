<?php

declare(strict_types=1);

namespace Sunxyw\SpiralAuth0Bridge\Bootloader;

use Auth0\SDK\Configuration\SdkConfiguration;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Core\Container;
use Sunxyw\SpiralAuth0Bridge\Config\Auth0Config;
use Auth0\SDK\Auth0;

final class Auth0BridgeBootloader extends Bootloader
{
    protected const BINDINGS = [];
    protected const SINGLETONS = [
        Auth0::class => [self::class, 'initAuth0Sdk'],
    ];
    protected const DEPENDENCIES = [];

    public function __construct()
    {
    }

    public function init(): void
    {
    }

    public function boot(Container $container): void
    {
    }

    private function initAuth0Sdk(Auth0Config $config): Auth0
    {
        return new Auth0(
            new SdkConfiguration(
                strategy: $config->getStrategy(),
                domain: $config->getDomain(),
                clientId: $config->getClientId(),
                clientSecret: $config->getClientSecret(),
                audience: $config->getAudience(),
            )
        );
    }
}
