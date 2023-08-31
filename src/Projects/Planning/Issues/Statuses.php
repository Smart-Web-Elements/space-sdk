<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Planning\Issues\Statuses\AutoUpdateOnMergeRequestMerge;
use Swe\SpaceSDK\Projects\Planning\Issues\Statuses\Distribution;
use Swe\SpaceSDK\Type;

/**
 * Class Statuses
 * Generated at 2023-08-31 02:00
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Statuses extends AbstractApi
{
    /**
     * Get all existing issue statuses in a project
     *
     * Permissions that may be checked: Project.Issues.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllIssueStatuses(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/planning/issues/statuses';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Configure issue statuses in a project. The list must contain at least one resolved and one unresolved status.
     *
     * Permissions that may be checked: Project.Issues.Manage
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateIssueStatusesList(string $project, array $data): void
    {
        $uri = 'projects/{project}/planning/issues/statuses';
        $required = [
            'statuses' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @return AutoUpdateOnMergeRequestMerge
     */
    final public function autoUpdateOnMergeRequestMerge(): AutoUpdateOnMergeRequestMerge
    {
        return new AutoUpdateOnMergeRequestMerge($this->client);
    }

    /**
     * @return Distribution
     */
    final public function distribution(): Distribution
    {
        return new Distribution($this->client);
    }
}
