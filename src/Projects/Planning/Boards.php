<?php

namespace Swe\SpaceSDK\Projects\Planning;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Planning\Boards\Archive;
use Swe\SpaceSDK\Projects\Planning\Boards\Issues;
use Swe\SpaceSDK\Projects\Planning\Boards\Sprints;
use Swe\SpaceSDK\Projects\Planning\Boards\Starred;
use Swe\SpaceSDK\Type;

/**
 * Class Boards
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\Projects\Planning
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Boards extends AbstractApi
{
    /**
     * Get a board by identifier
     *
     * Permissions that may be checked: Project.Planning.Boards.View
     *
     * @param string $board
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getBoard(string $board, array $response = []): array
    {
        $uri = 'projects/planning/boards/{board}';
        $uriArguments = [
            'board' => $board,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update an existing board. This operation can be performed by board owners or other members who are granted permission to manage boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.Manage
     *
     * @param string $board
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateBoard(string $board, array $data = []): void
    {
        $uri = 'projects/planning/boards/{board}';
        $uriArguments = [
            'board' => $board,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing board. This operation can be performed by board owners or other members who are granted permission to manage boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.Manage
     *
     * @param string $board
     * @return void
     * @throws GuzzleException
     */
    final public function deleteBoard(string $board): void
    {
        $uri = 'projects/planning/boards/{board}';
        $uriArguments = [
            'board' => $board,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Sprints
     */
    final public function sprints(): Sprints
    {
        return new Sprints($this->client);
    }

    /**
     * @return Issues
     */
    final public function issues(): Issues
    {
        return new Issues($this->client);
    }

    /**
     * Create a new issue board in a project. The user will become the owner of the board.
     *
     * Permissions that may be checked: Project.Planning.Boards.Create
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createBoard(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/planning/boards';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Search existing boards in a project
     *
     * Permissions that may be checked: Project.Planning.Boards.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllBoards(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/planning/boards';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @return Starred
     */
    final public function starred(): Starred
    {
        return new Starred($this->client);
    }

    /**
     * @return Archive
     */
    final public function archive(): Archive
    {
        return new Archive($this->client);
    }
}
