<?php

namespace Swe\SpaceSDK\AuthModules;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Test
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\AuthModules
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Test extends AbstractApi
{
    /**
     * For a username/password combination, test built-in authentication with updated settings
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function testBuiltInSettings(array $data, array $response = []): array
    {
        $uri = 'auth-modules/test/built-in';
        $required = [
            'settings' => [
                'passwordStrengthPolicy' => Type::String,
            ],
            'username' => Type::String,
            'password' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * For a username/password combination, test LDAP authentication with updated settings
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function testLdapSettings(array $data, array $response = []): array
    {
        $uri = 'auth-modules/test/ldap';
        $required = [
            'settings' => [
                'type' => Type::String,
                'registerNewUsers' => Type::Boolean,
                'serverUrl' => Type::String,
                'connectionTimeout' => Type::Integer,
                'readTimeout' => Type::Integer,
                'teamMappings' => Type::Array,
                'referralIgnored' => Type::Boolean,
                'filter' => Type::String,
                'bindUserDN' => Type::String,
                'bindUserPassword' => Type::String,
                'attributeNames' => [
                ],
            ],
            'username' => Type::String,
            'password' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }
}
