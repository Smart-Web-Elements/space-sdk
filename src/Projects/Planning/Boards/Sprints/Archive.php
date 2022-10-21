<?php

namespace Swe\SpaceSDK\Projects\Planning\Boards\Sprints;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Archive
 *
 * @package Swe\SpaceSDK\Projects\Planning\Boards\Sprints
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Archive extends AbstractApi
{
    /**
     * Archive closed or planned sprint. This operation can be performed by board owners or other members who are
     * granted permission to manage boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.Manage
     *
     * @param string $sprint
     * @return void
     * @throws GuzzleException
     */
    public function archiveSprint(string $sprint): void
    {
        $uri = 'projects/planning/boards/sprints/{sprint}/archive';
        $uriArguments = [
            'sprint' => $sprint,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}