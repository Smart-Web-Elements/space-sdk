<?php

namespace Swe\SpaceSDK\Projects\Access\Members;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Teams
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK\Projects\Access\Members
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Teams extends AbstractApi
{
    /**
     * Add a team to a project
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addTeam(string $project, array $data): void
    {
        $uri = 'projects/{project}/access/members/teams';
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
     * Remove a team from a project
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param string $teamId
     * @return void
     * @throws GuzzleException
     */
    final public function removeTeam(string $project, string $teamId): void
    {
        $uri = 'projects/{project}/access/members/teams/{teamId}';
        $uriArguments = [
            'project' => $project,
            'teamId' => $teamId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
