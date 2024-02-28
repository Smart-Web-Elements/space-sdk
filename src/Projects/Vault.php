<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Vault
 * Generated at 2024-02-28 02:00
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Vault extends AbstractApi
{
    /**
     * Create a new Vault connection for the project. Vault's AppRole Secret Id must be provided as base64 encoded string
     *
     * Permissions that may be checked: Project.VaultConnection.Modify
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createVault(array $data): string
    {
        $uri = 'projects/vault';
        $required = [
            'project' => Type::String,
            'url' => Type::String,
            'name' => Type::String,
            'appRoleEndpointPath' => Type::String,
            'appRoleId' => Type::String,
            'appRoleSecretIdBase64' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * Get an existing Vault connections for project
     *
     * Permissions that may be checked: Project.VaultConnection.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getVault(array $request, array $response = []): array
    {
        $uri = 'projects/vault';
        $required = [
            'project' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Update an existing Vault connection
     *
     * Permissions that may be checked: Project.VaultConnection.Modify
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateVault(string $id, array $data): void
    {
        $uri = 'projects/vault/{id}';
        $required = [
            'url' => Type::String,
            'name' => Type::String,
            'appRoleEndpointPath' => Type::String,
            'appRoleId' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing Vault connection
     *
     * Permissions that may be checked: Project.VaultConnection.Delete
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteVault(string $id): void
    {
        $uri = 'projects/vault/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
