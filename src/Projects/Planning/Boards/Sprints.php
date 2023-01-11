<?php

namespace Swe\SpaceSDK\Projects\Planning\Boards;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Planning\Boards\Sprints\Archive;
use Swe\SpaceSDK\Projects\Planning\Boards\Sprints\Issues;
use Swe\SpaceSDK\Type;

/**
 * Class Sprints
 * Generated at 2023-01-11 02:01
 *
 * @package Swe\SpaceSDK\Projects\Planning\Boards
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Sprints extends AbstractApi
{
    /**
     * Create a new sprint in a board. This operation can be performed by board owners or other members who are granted permission to manage boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.Manage
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createSprint(array $data, array $response = []): array
    {
        $uri = 'projects/planning/boards/sprints';
        $required = [
            'board' => Type::String,
            'name' => Type::String,
            'from' => Type::Date,
            'to' => Type::Date,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Launch a planned sprint. This operation can be performed by board owners or other members who are granted permission to manage boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.Manage
     *
     * @param string $sprint
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function launchPlannedSprint(string $sprint, array $data): void
    {
        $uri = 'projects/planning/boards/sprints/{sprint}/launch';
        $required = [
            'moveUnresolvedIssuesFromCurrentSprint' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'sprint' => $sprint,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Update an existing sprint in a board. This operation can be performed by board owners or other members who are granted permission to manage boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.Manage
     *
     * @param string $sprint
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateSprint(string $sprint, array $data = []): void
    {
        $uri = 'projects/planning/boards/sprints/{sprint}';
        $uriArguments = [
            'sprint' => $sprint,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @return Archive
     */
    final public function archive(): Archive
    {
        return new Archive($this->client);
    }

    /**
     * @return Issues
     */
    final public function issues(): Issues
    {
        return new Issues($this->client);
    }

    /**
     * Search existing sprints in a project
     *
     * Permissions that may be checked: Project.Planning.Boards.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllSprints(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/planning/boards/sprints';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
