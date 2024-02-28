<?php

namespace Swe\SpaceSDK\Projects\Access\Collaborators;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Teams
 * Generated at 2024-02-28 02:00
 *
 * @package Swe\SpaceSDK\Projects\Access\Collaborators
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Teams extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2023-07-01. Project collaborators are no longer supported
     */
    final public function addACollaboratorsTeam(string $project, array $data): void
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
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2023-07-01. Project collaborators are no longer supported
     */
    final public function getAllCollaboratorsTeams(string $project, array $response = []): array
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
     * @param string $project
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2023-07-01. Project collaborators are no longer supported
     */
    final public function removeACollaboratorsTeam(string $project, array $request): void
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
