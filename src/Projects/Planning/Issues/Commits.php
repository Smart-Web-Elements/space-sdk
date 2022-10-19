<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Commits
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Commits extends AbstractApi
{
    /**
     * Add commit links to an existing issue in a project.
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
    public function addCommitLinks(string $project, string $issueId, array $data): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/commits';
        $required = [
            'repository' => self::TYPE_STRING,
            'commitIds' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove commit links from an existing issue in a project.
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param string $project
     * @param string $issueId
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function removeCommitLinks(string $project, string $issueId, array $request): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/commits';
        $required = [
            'repository' => self::TYPE_STRING,
            'commitIds' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}