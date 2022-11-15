<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Teams\DirectMembers;
use Swe\SpaceSDK\Type;

/**
 * Class Teams
 * Generated at 2022-11-15 07:46
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Teams extends AbstractApi
{
    /**
     * Create a new team
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createTeam(array $data, array $response = []): array
    {
        $uri = 'team-directory/teams';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Cancel disbanding a team and restore its members
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function cancelTeamDisbanding(string $id): void
    {
        $uri = 'team-directory/teams/{id}/cancel-disbanding';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Restore an archived team
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function restoreTeam(string $id, array $response = []): array
    {
        $uri = 'team-directory/teams/{id}/restore';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), [], [], $response);
    }

    /**
     * Get or search all teams. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Team.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllTeams(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/teams';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get a team by ID
     *
     * Permissions that may be checked: Team.View
     *
     * @param string $id
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getTeam(string $id, array $response = []): ?array
    {
        $uri = 'team-directory/teams/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update a team
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateTeam(string $id, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/teams/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Archive a team
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function archiveTeam(string $id, array $response = []): array
    {
        $uri = 'team-directory/teams/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Disband a team
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function disbandTeam(string $id, array $response = []): array
    {
        $uri = 'team-directory/teams/{id}/disband';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @return DirectMembers
     */
    final public function directMembers(): DirectMembers
    {
        return new DirectMembers($this->client);
    }
}
