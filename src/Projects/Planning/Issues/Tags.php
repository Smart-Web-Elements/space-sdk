<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Tags
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Tags extends AbstractApi
{
    /**
     * Add an existing tag to an issue in a project
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param array $project
     * @param array $issueId
     * @param string $tagId
     * @return void
     * @throws GuzzleException
     */
    final public function addIssueTag(array $project, array $issueId, string $tagId): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/tags/{tagId}';
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
            'tagId' => $tagId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Remove an existing tag from an issue in a project
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param array $project
     * @param array $issueId
     * @param string $tagId
     * @return void
     * @throws GuzzleException
     */
    final public function removeIssueTag(array $project, array $issueId, string $tagId): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/tags/{tagId}';
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
            'tagId' => $tagId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
