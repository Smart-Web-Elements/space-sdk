<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Teams\DirectMembers;

/**
 * Class Teams
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Teams extends AbstractApi
{
    /**
     * Create a new team.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createTeam(array $data, array $response = []): array
    {
        $uri = 'team-directory/teams';
        $required = [
            'name' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Cancel disbanding a team and restore its members.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function cancelTeamDisbanding(string $id): void
    {
        $uri = 'team-directory/teams/{id}/cancel-disbanding';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Restore an archived team.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function restoreTeam(string $id, array $response = []): array
    {
        $uri = 'team-directory/teams/{id}/restore';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), [], $response);
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
    public function getAllTeams(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/teams';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Get a team by ID.
     *
     * Permissions that may be checked: Team.View
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getTeam(string $id, array $response = []): array
    {
        $uri = 'team-directory/teams/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Update a team.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updateTeam(string $id, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/teams/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Archive a team.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function archiveTeam(string $id, array $response = []): array
    {
        $uri = 'team-directory/teams/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Disband a team.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function disbandTeam(string $id, array $response = []): array
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
    public function directMembers(): DirectMembers
    {
        return new DirectMembers($this->client);
    }
}