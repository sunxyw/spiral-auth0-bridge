<?php

declare(strict_types=1);

namespace Sunxyw\SpiralAuth0Bridge\Security;

use Spiral\Auth\ActorProviderInterface;
use Spiral\Auth\TokenInterface;

class Auth0ActorProvider implements ActorProviderInterface
{
    public function getActor(TokenInterface $token): ?object
    {
        return new Auth0Actor(
            id: $token->getPayload()['sub'],
            accessToken: $token->getID(),
            payload: $token->getPayload(),
        );
    }
}
