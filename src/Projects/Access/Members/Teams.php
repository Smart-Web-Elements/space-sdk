<?php

namespace Swe\SpaceSDK\Projects\Access\Members;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Teams
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK\Projects\Access\Members
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Teams extends AbstractApi
{
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
