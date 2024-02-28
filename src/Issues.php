<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Issues
 * Generated at 2024-02-28 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Issues extends AbstractApi
{
    /**
     * Retrieve list of issues by identifiers. Issues can belong to different projects. Up to 100 issues can be retrieved within a single request. See also [Get all issues](/extensions/httpApiPlayground?resource=projects_xxx_planning_issues&endpoint=rest_query) (`/projects/{project}/planning/issues`)
     *
     * Permissions that may be checked: Project.Issues.View
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getIssuesByIdentifiers(array $data, array $response = []): array
    {
        $uri = 'issues/get-by-ids';
        $required = [
            'issueIdentifiers' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Retrieve an issue by its identifier
     *
     * Permissions that may be checked: Project.Issues.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getIssue(array $request, array $response = []): array
    {
        $uri = 'issues';
        $required = [
            'issueId' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
