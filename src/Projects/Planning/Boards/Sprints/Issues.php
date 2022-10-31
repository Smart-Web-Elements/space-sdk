<?php

namespace Swe\SpaceSDK\Projects\Planning\Boards\Sprints;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Issues
 *
 * @package Swe\SpaceSDK\Projects\Planning\Boards\Sprints
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Issues extends AbstractApi
{
    /**
     * Add an existing issue in a project to a sprint
     *
     * Permissions that may be checked: Project.Planning.Boards.EditContent
     *
     * @param array $issue
     * @param array $sprint
     * @return void
     * @throws GuzzleException
     */
    final public function addIssueToSprint(array $issue, array $sprint): void
    {
        $uri = 'projects/planning/boards/sprints/{sprint}/issues/{issue}';
        $uriArguments = [
            'sprint' => $sprint,
            'issue' => $issue,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Fetch issues from an existing non-archived sprint
     *
     * Permissions that may be checked: Project.Planning.Boards.View
     *
     * @param array $sprint
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllIssuesInSprint(array $sprint, array $request = [], array $response = []): array
    {
        $uri = 'projects/planning/boards/sprints/{sprint}/issues';
        $uriArguments = [
            'sprint' => $sprint,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Remove an existing issue in a project from a sprint.
     *
     * Permissions that may be checked: Project.Planning.Boards.EditContent
     *
     * @param array $issue
     * @param array $sprint
     * @return void
     * @throws GuzzleException
     */
    final public function removeIssueFromSprint(array $issue, array $sprint): void
    {
        $uri = 'projects/planning/boards/sprints/{sprint}/issues/{issue}';
        $uriArguments = [
            'sprint' => $sprint,
            'issue' => $issue,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
