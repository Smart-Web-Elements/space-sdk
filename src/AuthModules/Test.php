<?php

namespace Swe\SpaceSDK\AuthModules;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Test
 *
 * @package Swe\SpaceSDK\AuthModules
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Test extends AbstractApi
{
    /**
     * For a username/password combination, test built-in authentication with updated settings.
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testBuiltInSettings(array $data, array $response = []): array
    {
        $uri = 'auth-modules/test/built-in';
        $required = [
            'settings' => [
                'passwordStrengthPolicy' => self::TYPE_STRING,
            ],
            'username' => self::TYPE_STRING,
            'password' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * For a username/password combination, test LDAP authentication with updated settings.
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testLDAPSettings(array $data, array $response = []): array
    {
        $uri = 'auth-modules/test/ldap';
        $required = [
            'settings' => [
                'type' => self::TYPE_STRING,
                'registerNewUsers' => self::TYPE_BOOLEAN,
                'serverUrl' => self::TYPE_STRING,
                'connectionTimeout' => self::TYPE_INTEGER,
                'readTimeout' => self::TYPE_INTEGER,
                'teamMappings' => self::TYPE_ARRAY,
                'referralIgnored' => self::TYPE_BOOLEAN,
                'filter' => self::TYPE_STRING,
                'bindUserDN' => self::TYPE_STRING,
                'bindUserPassword' => self::TYPE_STRING,
                'attributeNames' => self::TYPE_ARRAY,
            ],
            'username' => self::TYPE_STRING,
            'password' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }
}