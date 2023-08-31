<?php

namespace Swe\SpaceSDK\Projects\Planning\Boards;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Archive
 * Generated at 2023-08-31 02:00
 *
 * @package Swe\SpaceSDK\Projects\Planning\Boards
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Archive extends AbstractApi
{
    /**
     * Archive an existing board. This operation can be performed by board owners or other members who are granted permission to manage boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.Manage
     *
     * @param string $project
     * @param string $board
     * @return void
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2021-12-22. Use DELETE /projects/planning/boards/{board} instead
     */
    final public function archiveBoard(string $project, string $board): void
    {
        $uri = 'projects/{project}/planning/boards/{board}/archive';
        $uriArguments = [
            'project' => $project,
            'board' => $board,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
