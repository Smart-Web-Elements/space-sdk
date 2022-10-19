<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Vault
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Vault extends AbstractApi
{
    /**
     * Create a new Vault connection for the project. Vault's AppRole Secret Id must be provided as base64 encoded
     * string.
     *
     * Permissions that may be checked: Project.VaultConnection.Modify
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createVault(array $data): string
    {
        $uri = 'projects/vault';
        $required = [
            'project' => self::TYPE_STRING,
            'url' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
            'appRoleEndpointPath' => self::TYPE_STRING,
            'appRoleId' => self::TYPE_STRING,
            'appRoleSecretIdBase64' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * Get an existing Vault connection for project.
     *
     * Permissions that may be checked: Project.VaultConnection.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getVault(string $project, array $response = []): array
    {
        $uri = 'projects/vault';
        $request = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Update an existing Vault connection.
     *
     * Permissions that may be checked: Project.VaultConnection.Modify
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateVault(string $id, array $data): void
    {
        $uri = 'projects/vault/{id}';
        $required = [
            'url' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
            'appRoleEndpointPath' => self::TYPE_STRING,
            'appRoleId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing Vault connection.
     *
     * Permissions that may be checked: Project.VaultConnection.Delete
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteVault(string $id): void
    {
        $uri = 'projects/vault/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}