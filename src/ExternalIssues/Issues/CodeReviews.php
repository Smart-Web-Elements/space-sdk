<?php

namespace Swe\SpaceSDK\ExternalIssues\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class CodeReviews
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK\ExternalIssues\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class CodeReviews extends AbstractApi
{
    /**
     * Add code review links to an existing issue in a project
     *
     * @param string $issuePrefix
     * @param string $issueId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function linkCodeReviewsToExternalIssue(string $issuePrefix, string $issueId, array $data): void
    {
        $uri = 'external-issues/issues/{issuePrefix}/{issueId}/code-reviews';
        $required = [
            'project' => Type::String,
            'codeReviewIds' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'issuePrefix' => $issuePrefix,
            'issueId' => $issueId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove code review links from an existing issue in a project
     *
     * @param string $issuePrefix
     * @param string $issueId
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function unlinkCodeReviewsFromExternalIssue(
        string $issuePrefix,
        string $issueId,
        array $request,
    ): void
    {
        $uri = 'external-issues/issues/{issuePrefix}/{issueId}/code-reviews';
        $required = [
            'project' => Type::String,
            'codeReviewIds' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'issuePrefix' => $issuePrefix,
            'issueId' => $issueId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
