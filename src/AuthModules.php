<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AuthModules\Config;
use Swe\SpaceSDK\AuthModules\Logins;
use Swe\SpaceSDK\AuthModules\Test;
use Swe\SpaceSDK\AuthModules\ThrottledLogins;
use Swe\SpaceSDK\AuthModules\Usages;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class AuthModules
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class AuthModules extends AbstractApi
{
    /**
     * Create a new authentication module. Settings are specific to the type of authentication module being created.
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function createAuthModule(array $data, array $response = []): array
    {
        $uri = 'auth-modules';
        $required = [
            'key' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
            'enabled' => self::TYPE_BOOLEAN,
            'settings' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Define the order of authentication modules. This affects the order of the federated authentication module buttons
     * on the sign-in page.
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function reorderAuthenticationModules(array $data): void
    {
        $uri = 'auth-modules/reorder';
        $required = [
            'order' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function samlMetadata(string $id, array $data, array $response = []): array
    {
        $uri = 'auth-modules/{id}/saml-metadata';
        $required = [
            'idpUrl' => self::TYPE_STRING,
            'idpEntityId' => self::TYPE_STRING,
            'idpCertificateSHA256' => self::TYPE_STRING,
            'spEntityId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Get all authentication modules.
     *
     * @param bool $withDisabled
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllAuthModules(bool $withDisabled = false, array $response = []): array
    {
        $uri = 'auth-modules';
        $request = [
            'withDisabled' => $withDisabled,
        ];

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Automatically discovers the endpoints for the OpenID Connect provider via discovery document.
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param string $discoveryEndpoint
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function discoverOIDC(string $discoveryEndpoint, array $response = []): array
    {
        $uri = 'auth-modules/discover-oidc';
        $request = [
            'discoveryEndpoint' => $discoveryEndpoint,
        ];

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Get an existing authentication module.
     *
     * @param string $key
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAuthModuleByKey(string $key, array $response = []): array
    {
        $uri = 'auth-modules/key:{key}';
        $uriArguments = [
            'key' => $key,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Update an existing authentication module. Optional parameters will be ignored when not specified and updated
     * otherwise.
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function updateAuthModule(string $id, array $data = []): void
    {
        $uri = 'auth-modules/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing authentication module.
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteAuthModule(string $id): void
    {
        $uri = 'auth-modules/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Config
     */
    public function config(): Config
    {
        return new Config($this->client);
    }

    /**
     * @return Logins
     */
    public function logins(): Logins
    {
        return new Logins($this->client);
    }

    /**
     * @return Test
     */
    public function test(): Test
    {
        return new Test($this->client);
    }

    /**
     * @return ThrottledLogins
     */
    public function throttledLogins(): ThrottledLogins
    {
        return new ThrottledLogins($this->client);
    }

    /**
     * @return Usages
     */
    public function usages(): Usages
    {
        return new Usages($this->client);
    }
}