<?php

namespace Swe\SpaceSDK\Projects\Planning;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Planning\Boards\Issues;
use Swe\SpaceSDK\Projects\Planning\Boards\Sprints;
use Swe\SpaceSDK\Projects\Planning\Boards\Starred;

/**
 * Class Boards
 *
 * @package Swe\SpaceSDK\Projects\Planning
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Boards extends AbstractApi
{
    /**
     * Get a board by identifier.
     *
     * Permissions that may be checked: Project.Planning.Boards.View
     *
     * @param string $board
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getBoard(string $board, array $response = []): array
    {
        $uri = 'projects/planning/boards/{board}';
        $uriArguments = [
            'board' => $board,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Update an existing board. This operation can be performed by board owners or other members who are granted
     * permission to manage boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.Manage
     *
     * @param string $board
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function updateBoard(string $board, array $data = []): void
    {
        $uri = 'projects/planning/boards/{board}';
        $uriArguments = [
            'board' => $board,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing board. This operation can be performed by board owners or other members who are granted
     * permission to manage boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.Manage
     *
     * @param string $board
     * @return void
     * @throws GuzzleException
     */
    public function deleteBoard(string $board): void
    {
        $uri = 'projects/planning/boards/{board}';
        $uriArguments = [
            'board' => $board,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Create a new issue board in a project. The user will become the owner of the board.
     *
     * Permissions that may be checked: Project.Planning.Boards.Create
     *
     * @param string $board
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function createBoard(string $board, array $data = [], array $response = []): array
    {
        $uri = 'projects/planning/boards/{board}';
        $uriArguments = [
            'board' => $board,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Search existing boards in a project.
     *
     * Permissions that may be checked: Project.Planning.Boards.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllBoards(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/planning/boards';
        $uriArguments = [
            'board' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * @return Issues
     */
    public function issues(): Issues
    {
        return new Issues($this->client);
    }

    /**
     * @return Sprints
     */
    public function sprints(): Sprints
    {
        return new Sprints($this->client);
    }

    /**
     * @return Starred
     */
    public function starred(): Starred
    {
        return new Starred($this->client);
    }
}