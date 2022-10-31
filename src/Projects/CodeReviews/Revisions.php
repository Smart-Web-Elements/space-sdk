<?php

namespace Swe\SpaceSDK\Projects\CodeReviews;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Revisions
 *
 * @package Swe\SpaceSDK\Projects\CodeReviews
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Revisions extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.CodeReview.Edit
     *
     * @param array $project
     * @param array $reviewId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addRevisionsToReview(array $project, array $reviewId, array $data): void
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
     * @param array $project
     * @param array $reviewId
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeRevisionsFromReview(array $project, array $reviewId, array $request): void
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
