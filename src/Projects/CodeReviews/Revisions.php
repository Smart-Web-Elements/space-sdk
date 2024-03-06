<?php

namespace Swe\SpaceSDK\Projects\CodeReviews;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Revisions
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\Projects\CodeReviews
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Revisions extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.CodeReview.Edit
     *
     * @param string $project
     * @param string $reviewId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addRevisionsToReview(string $project, string $reviewId, array $data): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/revisions';
        $required = [
            'revisions' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.Edit
     *
     * @param string $project
     * @param string $reviewId
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeRevisionsFromReview(string $project, string $reviewId, array $request): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/revisions';
        $required = [
            'revisions' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
