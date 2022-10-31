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
final class Issues extends AbstractApi
{
    /**
     * Add an existing issue in a project to a board or its current sprint
     *
     * Permissions that may be checked: Project.Planning.Boards.EditContent
     *
     * @param array $issue
     * @param array $board
     * @return void
     * @throws GuzzleException
     */
    final public function addIssueToBoard(array $issue, array $board): void
    {
        $uri = 'projects/planning/boards/{board}/issues/{issue}';
        $uriArguments = [
            'board' => $board,
            'issue' => $issue,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Fetch issues from the board across all its non-archived sprints
     *
     * Permissions that may be checked: Project.Planning.Boards.View
     *
     * @param array $board
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllIssuesOnBoard(array $board, array $request = [], array $response = []): array
    {
        $uri = 'projects/planning/boards/{board}/issues';
        $uriArguments = [
            'board' => $board,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Remove an existing issue in a project from a board or all of its sprints
     *
     * Permissions that may be checked: Project.Planning.Boards.EditContent
     *
     * @param array $issue
     * @param array $board
     * @return void
     * @throws GuzzleException
     */
    final public function removeIssueFromBoard(array $issue, array $board): void
    {
        $uri = 'projects/planning/boards/{board}/issues/{issue}';
        $uriArguments = [
            'board' => $board,
            'issue' => $issue,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
