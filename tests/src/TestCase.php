<?php

namespace Sunxyw\SpiralAuth0Bridge\Tests;

class TestCase extends \Spiral\Testing\TestCase
{
    public function rootDirectory(): string
    {
        return __DIR__.'/../';
    }

    public function defineBootloaders(): array
    {
        return [
            \Spiral\Boot\Bootloader\ConfigurationBootloader::class,
            \Sunxyw\SpiralAuth0Bridge\SpiralAuth0BridgeBootloader::class,
            // ...
        ];
    }
}
