<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\ExternalIssues\ExternalTrackerProjects;
use Swe\SpaceSDK\ExternalIssues\Issues;

/**
 * Class ExternalIssues
 * Generated at 2024-02-28 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ExternalIssues extends AbstractApi
{
    /**
     * Set default status to move external issues to when linked merge request is merged in Space
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setDefaultTargetIssueStatusForMergeRequestMerge(array $data): void
    {
        $uri = 'external-issues/default-issue-status-for-mr-merge';
        $required = [
            'application' => Type::String,
            'project' => Type::String,
            'issuePrefix' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Provide information about an issue from external issue tracker
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function postExternalIssueData(array $data): void
    {
        $uri = 'external-issues/issue-content';
        $required = [
            'issuePrefix' => Type::String,
            'issues' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Provide Space with all possible statuses for external issues for a given project
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function provideAllPossibleStatusesForExternalIssues(array $data): void
    {
        $uri = 'external-issues/issue-statuses';
        $required = [
            'issuePrefix' => Type::String,
            'statuses' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Notify Space about issues that were deleted in external issue tracker
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function markExternalIssuesAsDeleted(array $data): void
    {
        $uri = 'external-issues/mark-issues-as-deleted';
        $required = [
            'issuePrefix' => Type::String,
            'issueIds' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Fetch events about external issues from Space
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getExternalIssueEventQueueItems(array $request, array $response = []): array
    {
        $uri = 'external-issues/events-queue';
        $required = [
            'batchSize' => Type::Integer,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * @return ExternalTrackerProjects
     */
    final public function externalTrackerProjects(): ExternalTrackerProjects
    {
        return new ExternalTrackerProjects($this->client);
    }

    /**
     * @return Issues
     */
    final public function issues(): Issues
    {
        return new Issues($this->client);
    }
}
