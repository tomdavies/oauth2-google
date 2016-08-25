<?php

namespace Dukt\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class Google extends AbstractProvider
{
    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        $fields = array_merge($this->defaultUserFields, $this->userFields);
        return 'https://www.googleapis.com/oauth2/v1/userinfo?' . http_build_query([
            'fields' => implode(',', $fields),
            'alt'    => 'json',
        ]);
    }
}
