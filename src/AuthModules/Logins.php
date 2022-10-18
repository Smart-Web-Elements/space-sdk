<?php

namespace Swe\SpaceSDK\AuthModules;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Logins
 *
 * @package Swe\SpaceSDK\AuthModules
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Logins extends AbstractApi
{
    /**
     * Change password for a given authentication module (id) and profile (identifier).
     *
     * @param string $id
     * @param string $identifier
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function changePassword(string $id, string $identifier, array $data): void
    {
        $uri = 'auth-modules/{id}/logins/{identifier}/change';
        $required = [
            'oldPassword' => self::TYPE_STRING,
            'newPassword' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
            'identifier' => $identifier,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Request a password reset for a given authentication module (id) and profile (identifier).
     *
     * @param string $id
     * @param string $identifier
     * @return void
     * @throws GuzzleException
     */
    public function resetPassword(string $id, string $identifier): void
    {
        $uri = 'auth-modules/{id}/logins/{identifier}/reset';
        $uriArguments = [
            'id' => $id,
            'identifier' => $identifier,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Detach a profile login from an authentication module. The id parameter refers to the authentication module, the
     * identifier parameter refers to the login.
     *
     * @param string $id
     * @param string $identifier
     * @return void
     * @throws GuzzleException
     */
    public function deleteLogin(string $id, string $identifier): void
    {
        $uri = 'auth-modules/{id}/logins/{identifier}';
        $uriArguments = [
            'id' => $id,
            'identifier' => $identifier,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}