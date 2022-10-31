<?php

namespace Swe\SpaceSDK\Projects\Access\Collaborators;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Teams
 *
 * @package Swe\SpaceSDK\Projects\Access\Collaborators
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Teams extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Admin
     *
     * @param array $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addACollaboratorsTeam(array $project, array $data): void
    {
        $uri = 'projects/{project}/access/collaborators/teams';
        $required = [
            'teamId' => Type::String,
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
     * @param array $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllCollaboratorsTeams(array $project, array $response = []): array
    {
        $uri = 'projects/{project}/access/collaborators/teams';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Project.Admin
     *
     * @param array $project
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeACollaboratorsTeam(array $project, array $request): void
    {
        $uri = 'projects/{project}/access/collaborators/teams';
        $required = [
            'teamId' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
