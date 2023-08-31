<?php

namespace Swe\SpaceSDK\Projects\CodeReviews;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Participants
 * Generated at 2023-08-31 02:00
 *
 * @package Swe\SpaceSDK\Projects\CodeReviews
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Participants extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.CodeReview.Edit
     *
     * @param string $project
     * @param string $reviewId
     * @param string $user
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addReviewParticipant(string $project, string $reviewId, string $user, array $data): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/participants/{user}';
        $required = [
            'role' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
            'user' => $user,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.Edit
     *
     * @param string $project
     * @param string $reviewId
     * @param string $user
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeReviewParticiopant(
        string $project,
        string $reviewId,
        string $user,
        array $request,
    ): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/participants/{user}';
        $required = [
            'role' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
            'user' => $user,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
