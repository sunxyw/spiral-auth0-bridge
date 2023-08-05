<?php

declare(strict_types=1);

namespace Sunxyw\SpiralAuth0Bridge\Security;

use Spiral\Security\ActorInterface;

class Auth0Actor implements ActorInterface
{
    public function __construct(
        public readonly string $id,
        private readonly array $payload,
    )
    {
    }

    public function getRoles(): array
    {
        return [];
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function __get(string $name)
    {
        return $this->payload[$name];
    }

    public function __set(string $name, mixed $value): void
    {
        throw new \RuntimeException('Auth0Actor is immutable.');
    }

    public function __isset(string $name): bool
    {
        return isset($this->payload[$name]);
    }
}
