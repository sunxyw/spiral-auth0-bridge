<?php

declare(strict_types=1);

namespace Sunxyw\SpiralAuth0Bridge\Security;

use DateTimeImmutable;
use Spiral\Auth\TokenInterface;

/**
 * @mixin \Auth0\SDK\Contract\TokenInterface
 */
final class Auth0Token implements TokenInterface
{
    public function __construct(
        private readonly string                             $id,
        private readonly \Auth0\SDK\Contract\TokenInterface $auth0Token,
    )
    {
    }

    public function getID(): string
    {
        return $this->id;
    }

    public function getExpiresAt(): ?\DateTimeInterface
    {
        $exp = $this->auth0Token->getExpiration();
        if ($exp === null) {
            return null;
        }
        return (new DateTimeImmutable())->setTimestamp($exp);
    }

    public function getPayload(): array
    {
        return $this->toArray();
    }

    public function __call(string $name, array $arguments)
    {
        return $this->auth0Token->$name(...$arguments);
    }
}
