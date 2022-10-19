<?php

namespace Swe\SpaceSDK\Projects\CodeReviews;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Participants
 *
 * @package Swe\SpaceSDK\Projects\CodeReviews
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Participants extends AbstractApi
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
    public function addReviewParticipant(string $project, string $reviewId, string $user, array $data): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/participants/{user}';
        $required = [
            'role' => self::TYPE_STRING,
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
     * @param string $role
     * @return void
     * @throws GuzzleException
     */
    public function removeReviewParticipant(string $project, string $reviewId, string $user, string $role): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/participants/{user}';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
            'user' => $user,
        ];
        $request = [
            'role' => $role,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}