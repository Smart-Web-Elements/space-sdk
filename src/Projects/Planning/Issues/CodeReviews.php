<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class CodeReviews
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class CodeReviews extends AbstractApi
{
    /**
     * Add code review links to an existing issue in a project
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param array $project
     * @param array $issueId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addCodeReviewLinks(array $project, array $issueId, array $data): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/code-reviews';
        $required = [
            'codeReviewIds' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove code review links from an existing issue in a project
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param array $project
     * @param array $issueId
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeCodeReviewLinks(array $project, array $issueId, array $request): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/code-reviews';
        $required = [
            'codeReviewIds' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
