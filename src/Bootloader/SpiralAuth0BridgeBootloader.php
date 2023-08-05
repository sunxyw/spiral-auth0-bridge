<?php

declare(strict_types=1);

namespace Sunxyw\SpiralAuth0Bridge\Bootloader;

use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Core\Container;
use Spiral\Config\ConfiguratorInterface;
use Sunxyw\SpiralAuth0Bridge\Commands;
use Sunxyw\SpiralAuth0Bridge\Config\SpiralAuth0BridgeConfig;
use Spiral\Console\Bootloader\ConsoleBootloader;

final class SpiralAuth0BridgeBootloader extends Bootloader
{
    protected const BINDINGS = [];
    protected const SINGLETONS = [];
    protected const DEPENDENCIES = [];

    public function __construct(
        private readonly ConfiguratorInterface $config
    ) {
    }

    public function init(ConsoleBootloader $console): void
    {
        $this->initConfig();

        $console->addCommand(Commands\SpiralAuth0BridgeCommand::class);
    }

    public function boot(Container $container): void
    {
    }

    private function initConfig(): void
    {
        $this->config->setDefaults(
            SpiralAuth0BridgeConfig::CONFIG,
            []
        );
    }
}
