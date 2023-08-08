<?php

namespace Swe\SpaceSDK\Projects\People;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Teams
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\Projects\People
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Teams extends AbstractApi
{
    /**
     * Adds or removes project team participant roles
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateParticipantRoles(string $project, array $data): void
    {
        $uri = 'projects/{project}/people/teams/update';
        $required = [
            'team' => Type::String,
            'addRoles' => Type::Array,
            'removeRoles' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Returns all project participant teams
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllParticipants(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/people/teams';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Returns project participant teams by provided teams
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getParticipantsByTeams(string $project, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/people/teams/by-ids';
        $required = [
            'teams' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Removes participant
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param string $team
     * @return void
     * @throws GuzzleException
     */
    final public function removeParticipant(string $project, string $team): void
    {
        $uri = 'projects/{project}/people/teams/{team}';
        $uriArguments = [
            'project' => $project,
            'team' => $team,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
