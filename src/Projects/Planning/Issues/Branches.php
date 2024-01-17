<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Branches
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Branches extends AbstractApi
{
    /**
     * Add branch links to an existing issue in a project
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
    final public function addBranchLinks(string $project, string $issueId, array $data): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/branches';
        $required = [
            'repository' => Type::String,
            'branches' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove branch links from an existing issue in a project
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
    final public function removeBranchLinks(string $project, string $issueId, array $request): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/branches';
        $required = [
            'repository' => Type::String,
            'branchHeads' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
