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
 * Generated at 2023-02-07 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class AuthModules extends AbstractApi
{
    /**
     * Create a new authentication module. Settings are specific to the type of authentication module being created.
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createAuthModule(array $data, array $response = []): array
    {
        $uri = 'auth-modules';
        $required = [
            'key' => Type::String,
            'name' => Type::String,
            'enabled' => Type::Boolean,
            'settings' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Define the order of authentication modules. This affects the order of the federated authentication module buttons on the sign-in page.
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function reorderAuthenticationModules(array $data): void
    {
        $uri = 'auth-modules/reorder';
        $required = [
            'order' => Type::Array,
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
    final public function samlMetadata(string $id, array $data, array $response = []): array
    {
        $uri = 'auth-modules/{id}/saml-metadata';
        $required = [
            'idpUrl' => Type::String,
            'idpEntityId' => Type::String,
            'idpCertificateSHA256' => Type::String,
            'spEntityId' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Get all authentication modules
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllAuthModules(array $request = [], array $response = []): array
    {
        $uri = 'auth-modules';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Automatically discovers the endpoints for the OpenID Connect provider via discovery document
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function discoverOidc(array $request, array $response = []): array
    {
        $uri = 'auth-modules/discover-oidc';
        $required = [
            'discoveryEndpoint' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get an existing authentication module
     *
     * @param string $key
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getAuthModuleByKey(string $key, array $response = []): ?array
    {
        $uri = 'auth-modules/key:{key}';
        $uriArguments = [
            'key' => $key,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update an existing authentication module. Optional parameters will be ignored when not specified and updated otherwise.
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateAuthModule(string $id, array $data = []): void
    {
        $uri = 'auth-modules/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing authentication module
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteAuthModule(string $id): void
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
    final public function config(): Config
    {
        return new Config($this->client);
    }

    /**
     * @return Test
     */
    final public function test(): Test
    {
        return new Test($this->client);
    }

    /**
     * @return ThrottledLogins
     */
    final public function throttledLogins(): ThrottledLogins
    {
        return new ThrottledLogins($this->client);
    }

    /**
     * @return Usages
     */
    final public function usages(): Usages
    {
        return new Usages($this->client);
    }

    /**
     * @return Logins
     */
    final public function logins(): Logins
    {
        return new Logins($this->client);
    }
}
