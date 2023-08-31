<?php

namespace Swe\SpaceSDK\Projects\CodeReviews;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class SafeMerge
 * Generated at 2023-08-31 02:00
 *
 * @package Swe\SpaceSDK\Projects\CodeReviews
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class SafeMerge extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.CodeReview.View, VcsRepository.Write
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function startSafeMerge(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/safe-merge';
        $required = [
            'mergeRequestId' => Type::String,
            'mergeOptions' => [
                'operation' => Type::String,
                'mergeMode' => Type::String,
                'rebaseMode' => Type::String,
                'squashMode' => Type::String,
                'squashCommitMessage' => Type::String,
                'deleteSourceBranch' => Type::Boolean,
                'targetStatusesForLinkedIssues' => Type::Array,
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getSafeMerge(string $project, array $request, array $response = []): ?array
    {
        $uri = 'projects/{project}/code-reviews/safe-merge';
        $required = [
            'mergeRequestId' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View, VcsRepository.Write
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function stopSafeMerge(string $project, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/safe-merge';
        $required = [
            'mergeRequestId' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
