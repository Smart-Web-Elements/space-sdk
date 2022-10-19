<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues\Statuses;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class AutoUpdateOnMergeRequestMerge
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues\Statuses
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class AutoUpdateOnMergeRequestMerge extends AbstractApi
{
    /**
     * Get target issue status for auto updating issues on linked merge request merge.
     *
     * Permissions that may be checked: Project.Issues.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAutoUpdateTargetIssueStatusForMergeRequestMerge(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/planning/issues/statuses/auto-update-on-merge-request-merge';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Set target issue status for auto updating issues on linked merge request merge.
     *
     * Permissions that may be checked: Project.Issues.Manage
     *
     * @param string $project
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    public function setAutoUpdateTargetIssueStatusForMergeRequestMerge(string $project, array $request = []): void
    {
        $uri = 'projects/{project}/planning/issues/statuses/auto-update-on-merge-request-merge';
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}