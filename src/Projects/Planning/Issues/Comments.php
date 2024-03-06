<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Comments
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Comments extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Issues.Import
     *
     * @param string $project
     * @param string $issueId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2022-10-12. Use Chats / Messages / Import messages
     */
    final public function importIssueCommentHistory(
        string $project,
        string $issueId,
        array $data,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/comments/import';
        $required = [
            'comments' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }
}
