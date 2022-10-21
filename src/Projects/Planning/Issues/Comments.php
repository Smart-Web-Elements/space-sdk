<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Comments
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Comments extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Issues.Import
     *
     * @param string $project
     * @param string $issueId
     * @param array $data
     * @return string[]
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function importIssueCommentHistory(string $project, string $issueId, array $data): array
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/comments/import';
        $required = [
            'comments' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }
}