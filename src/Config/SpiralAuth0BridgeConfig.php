<?php

declare(strict_types=1);

namespace Sunxyw\SpiralAuth0Bridge\Config;

use Spiral\Core\InjectableConfig;

final class SpiralAuth0BridgeConfig extends InjectableConfig
{
    public const CONFIG = 'spiral-auth0-bridge';
    protected array $config = [];
}
