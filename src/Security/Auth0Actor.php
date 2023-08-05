<?php

declare(strict_types=1);

namespace Sunxyw\SpiralAuth0Bridge\Security;

use Spiral\Security\ActorInterface;

class Auth0Actor implements ActorInterface
{
    public function __construct(
        public readonly string $id,
        public readonly string $accessToken,
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
}
