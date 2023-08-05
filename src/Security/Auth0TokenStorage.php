<?php

declare(strict_types=1);

namespace Sunxyw\SpiralAuth0Bridge\Security;

use RuntimeException;
use Spiral\Auth\TokenInterface;
use Spiral\Auth\TokenStorageInterface;
use Auth0\SDK\Auth0;

final class Auth0TokenStorage implements TokenStorageInterface
{
    public function __construct(
        private readonly Auth0 $auth0,
    )
    {
    }

    public function load(string $id): ?TokenInterface
    {
        // we receive the token from AuthTransport,
        // so we don't need to use of Auth0Sdk bundled methods,
        // just directly pass the token.
        $token = $this->auth0->getBearerToken(
            haystack: ['id' => $id],
            needles: ['id'],
        );
        if ($token === null) {
            return null;
        }
        return new Auth0Token(
            id: $id,
            auth0Token: $token,
        );
    }

    public function create(array $payload, \DateTimeInterface $expiresAt = null): TokenInterface
    {
        // we do not need to create a token,
        throw new RuntimeException('Token creation is not supported by Auth0TokenStorage.');
    }

    public function delete(TokenInterface $token): void
    {
        // we do not need to delete a token,
        throw new RuntimeException('Token deletion is not supported by Auth0TokenStorage.');
    }
}
