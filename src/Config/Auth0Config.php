<?php

declare(strict_types=1);

namespace Sunxyw\SpiralAuth0Bridge\Config;

use Auth0\SDK\Configuration\SdkConfiguration;
use Spiral\Core\InjectableConfig;

final class Auth0Config extends InjectableConfig
{
    public const CONFIG = 'auth0';

    protected array $config = [
        'strategy' => SdkConfiguration::STRATEGY_API,
        'domain' => '',
        'clientId' => '',
        'clientSecret' => '',
        'audience' => [],
    ];

    public function getStrategy(): string
    {
        return (string)$this->config['strategy'];
    }

    public function getDomain(): string
    {
        return (string)$this->config['domain'];
    }

    public function getClientId(): string
    {
        return (string)$this->config['clientId'];
    }

    public function getClientSecret(): string
    {
        return (string)$this->config['clientSecret'];
    }

    /**
     * @return array<array-key, string>
     */
    public function getAudience(): array
    {
        /** @var array<array-key, string> */
        return $this->config['audience'];
    }
}
