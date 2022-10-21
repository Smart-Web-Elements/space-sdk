<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues\Statuses;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Distribution
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues\Statuses
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Distribution extends AbstractApi
{
    /**
     * Get all existing issue statuses with their usage, number of existing issues, in a project.
     *
     * Permissions that may be checked: Project.Issues.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getIssueStatusDistribution(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/planning/issues/statuses/distribution';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }
}