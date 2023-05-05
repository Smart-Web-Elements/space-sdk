<?php

namespace Swe\SpaceSDK\Projects\CodeReviews;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class UnboundDiscussions
 * Generated at 2023-05-05 02:00
 *
 * @package Swe\SpaceSDK\Projects\CodeReviews
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class UnboundDiscussions extends AbstractApi
{
    /**
     * @param string $project
     * @param string $reviewId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createUnboundDiscussion(
        string $project,
        string $reviewId,
        array $data,
        array $response = [],
    ): array {
        $uri = 'projects/{project}/code-reviews/{reviewId}/unbound-discussions';
        $required = [
            'channelItemId' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $reviewId
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllUnboundDiscussions(
        string $project,
        string $reviewId,
        array $request = [],
        array $response = [],
    ): array {
        $uri = 'projects/{project}/code-reviews/{reviewId}/unbound-discussions';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $project
     * @param string $reviewId
     * @param string $discussionId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function toggleUnboundDiscussionResolution(
        string $project,
        string $reviewId,
        string $discussionId,
        array $data = [],
    ): void {
        $uri = 'projects/{project}/code-reviews/{reviewId}/unbound-discussions/{discussionId}/toggle';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
            'discussionId' => $discussionId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
