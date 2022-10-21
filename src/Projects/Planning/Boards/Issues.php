<?php

namespace Swe\SpaceSDK\Projects\Planning\Boards;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Issues
 *
 * @package Swe\SpaceSDK\Projects\Planning\Boards
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Issues extends AbstractApi
{
    /**
     * Add an existing issue in a project to a board or its current sprint.
     *
     * Permissions that may be checked: Project.Planning.Boards.EditContent
     *
     * @param string $issue
     * @param string $board
     * @return void
     * @throws GuzzleException
     */
    public function addIssueToBoard(string $issue, string $board): void
    {
        $uri = 'projects/planning/boards/{board}/issues/{issue}';
        $uriArguments = [
            'board' => $board,
            'issue' => $issue,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Fetch issues from the board across all its non-archived sprints.
     *
     * Permissions that may be checked: Project.Planning.Boards.View
     *
     * @param string $board
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllIssuesOnBoard(string $board, array $request = [], array $response = []): array
    {
        $uri = 'projects/planning/boards/{board}/issues';
        $uriArguments = [
            'board' => $board,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Remove an existing issue in a project from a board or all of its sprints.
     *
     * Permissions that may be checked: Project.Planning.Boards.EditContent
     *
     * @param string $issue
     * @param string $board
     * @return void
     * @throws GuzzleException
     */
    public function removeIssueFromBoard(string $issue, string $board): void
    {
        $uri = 'projects/planning/boards/{board}/issues/{issue}';
        $uriArguments = [
            'board' => $board,
            'issue' => $issue,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}