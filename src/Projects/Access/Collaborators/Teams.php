<?php

namespace Swe\SpaceSDK\Projects\Access\Collaborators;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Teams
 *
 * @package Swe\SpaceSDK\Projects\Access\Collaborators
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Teams extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addACollaboratorsTeam(string $project, array $data): void
    {
        $uri = 'projects/{project}/access/collaborators/teams';
        $required = [
            'teamId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllCollaboratorsTeams(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/access/collaborators/teams';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param string $teamId
     * @return void
     * @throws GuzzleException
     */
    public function removeACollaboratorsTeam(string $project, string $teamId): void
    {
        $uri = 'projects/{project}/access/collaborators/teams';
        $uriArguments = [
            'project' => $project,
        ];
        $request = [
            'teamId' => $teamId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}