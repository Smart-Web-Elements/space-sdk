<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Roles
 * Generated at 2023-01-27 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Roles extends AbstractApi
{
    /**
     * Create a role
     *
     * Permissions that may be checked: Roles.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createRole(array $data, array $response = []): array
    {
        $uri = 'team-directory/roles';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Restore an archived role
     *
     * Permissions that may be checked: Roles.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function restoreRole(string $id, array $response = []): array
    {
        $uri = 'team-directory/roles/{id}/restore';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), [], [], $response);
    }

    /**
     * Get/search all roles. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Roles.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllRoles(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/roles';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get a role by ID
     *
     * Permissions that may be checked: Roles.View
     *
     * @param string $id
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getRole(string $id, array $response = []): ?array
    {
        $uri = 'team-directory/roles/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update a role. Optional parameters will be ignored when null and updated otherwise.
     *
     * Permissions that may be checked: Roles.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateRole(string $id, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/roles/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Archive a role
     *
     * Permissions that may be checked: Roles.Edit
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function archiveRole(string $id): void
    {
        $uri = 'team-directory/roles/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
