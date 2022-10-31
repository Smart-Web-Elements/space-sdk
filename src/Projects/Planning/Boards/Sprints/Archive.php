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
final class Archive extends AbstractApi
{
    /**
     * Archive closed or planned sprint. This operation can be performed by board owners or other members who are granted permission to manage boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.Manage
     *
     * @param array $sprint
     * @return void
     * @throws GuzzleException
     */
    final public function archiveSprint(array $sprint): void
    {
        $uri = 'projects/planning/boards/sprints/{sprint}/archive';
        $uriArguments = [
            'sprint' => $sprint,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
