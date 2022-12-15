<?php

namespace Swe\SpaceSDK\Projects\Planning;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Planning\Issues\Attachments;
use Swe\SpaceSDK\Projects\Planning\Issues\Checklists;
use Swe\SpaceSDK\Projects\Planning\Issues\CodeReviews;
use Swe\SpaceSDK\Projects\Planning\Issues\Comments;
use Swe\SpaceSDK\Projects\Planning\Issues\Commits;
use Swe\SpaceSDK\Projects\Planning\Issues\Statuses;
use Swe\SpaceSDK\Projects\Planning\Issues\Tags;
use Swe\SpaceSDK\Type;

/**
 * Class Issues
 * Generated at 2022-12-15 11:10
 *
 * @package Swe\SpaceSDK\Projects\Planning
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Issues extends AbstractApi
{
    /**
     * Create a new issue in a project
     *
     * Permissions that may be checked: Project.Issues.Create
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createIssue(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/planning/issues';
        $required = [
            'title' => Type::String,
            'status' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Import issues in a project
     *
     * Permissions that may be checked: Project.Issues.Import
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function importIssues(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/planning/issues/import';
        $required = [
            'metadata' => [
                'importSource' => Type::String,
            ],
            'issues' => Type::Array,
            'dryRun' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Restore an issue in a project
     *
     * Permissions that may be checked: Project.Issues.Restore
     *
     * @param string $project
     * @param string $issueId
     * @return void
     * @throws GuzzleException
     */
    final public function restoreIssue(string $project, string $issueId): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/restore';
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Toggle status of an existing issue between resolved and unresolved
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param string $project
     * @param string $issueId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function toggleIssueResolvedStatus(string $project, string $issueId, array $data): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/toggle-resolved';
        $required = [
            'resolved' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Search existing issues in a project. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Project.Issues.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllIssues(string $project, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/planning/issues';
        $required = [
            'sorting' => Type::String,
            'descending' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Find an existing issue by a given number in a project
     *
     * Permissions that may be checked: Project.Issues.View
     *
     * @param string $project
     * @param int $number
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getIssueByNumber(
        string $project,
        int $number,
        array $request = [],
        array $response = [],
    ): array {
        $uri = 'projects/{project}/planning/issues/number:{number}';
        $uriArguments = [
            'project' => $project,
            'number' => $number,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Project.Issues.View
     *
     * @param string $project
     * @param string $issueId
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getIssue(string $project, string $issueId, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/planning/issues/{issueId}';
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Update an existing issue in a project
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param string $project
     * @param string $issueId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateIssue(string $project, string $issueId, array $data = []): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}';
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an issue from a project
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param string $project
     * @param string $issueId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteIssue(string $project, string $issueId): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}';
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Statuses
     */
    final public function statuses(): Statuses
    {
        return new Statuses($this->client);
    }

    /**
     * @return Attachments
     */
    final public function attachments(): Attachments
    {
        return new Attachments($this->client);
    }

    /**
     * @return Checklists
     */
    final public function checklists(): Checklists
    {
        return new Checklists($this->client);
    }

    /**
     * @return CodeReviews
     */
    final public function codeReviews(): CodeReviews
    {
        return new CodeReviews($this->client);
    }

    /**
     * @return Comments
     */
    final public function comments(): Comments
    {
        return new Comments($this->client);
    }

    /**
     * @return Commits
     */
    final public function commits(): Commits
    {
        return new Commits($this->client);
    }

    /**
     * @return Tags
     */
    final public function tags(): Tags
    {
        return new Tags($this->client);
    }
}
