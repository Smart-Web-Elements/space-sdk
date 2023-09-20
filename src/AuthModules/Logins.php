<?php

namespace Swe\SpaceSDK\AuthModules;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Logins
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK\AuthModules
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Logins extends AbstractApi
{
    /**
     * Change password for a given authentication module (id) and profile (identifier)
     *
     * @param string $id
     * @param string $identifier
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function changePassword(string $id, string $identifier, array $data): void
    {
        $uri = 'auth-modules/{id}/logins/{identifier}/change';
        $required = [
            'oldPassword' => Type::String,
            'newPassword' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
            'identifier' => $identifier,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Request a password reset for a given authentication module (id) and profile (identifier)
     *
     * @param string $id
     * @param string $identifier
     * @return void
     * @throws GuzzleException
     */
    final public function resetPassword(string $id, string $identifier): void
    {
        $uri = 'auth-modules/{id}/logins/{identifier}/reset';
        $uriArguments = [
            'id' => $id,
            'identifier' => $identifier,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Detach a profile login from an authentication module. The id parameter refers to the authentication module, the identifier parameter refers to the login.
     *
     * @param string $identifier
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteLogin(string $identifier, string $id): void
    {
        $uri = 'auth-modules/{id}/logins/{identifier}';
        $uriArguments = [
            'id' => $id,
            'identifier' => $identifier,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
