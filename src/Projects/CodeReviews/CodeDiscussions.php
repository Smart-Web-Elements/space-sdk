<?php

namespace Swe\SpaceSDK\Projects\CodeReviews;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\CodeReviews\CodeDiscussions\SuggestedEdit;
use Swe\SpaceSDK\Type;

/**
 * Class CodeDiscussions
 * Generated at 2023-08-31 02:00
 *
 * @package Swe\SpaceSDK\Projects\CodeReviews
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class CodeDiscussions extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.CodeReview.View, Project.SuggestedEdit.Create
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createCodeDiscussion(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/code-discussions';
        $required = [
            'text' => Type::String,
            'repository' => Type::String,
            'reviewId' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.SuggestedEdit.Moderate
     *
     * @param string $project
     * @param string $discussionId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function acceptSuggestedEdit(string $project, string $discussionId, array $data): void
    {
        $uri = 'projects/{project}/code-reviews/code-discussions/{discussionId}/accept-suggested-edit';
        $required = [
            'commitMessage' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'discussionId' => $discussionId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Project.SuggestedEdit.Moderate
     *
     * @param string $project
     * @param string $discussionId
     * @return void
     * @throws GuzzleException
     */
    final public function rejectSuggestedEdit(string $project, string $discussionId): void
    {
        $uri = 'projects/{project}/code-reviews/code-discussions/{discussionId}/reject-suggested-edit';
        $uriArguments = [
            'project' => $project,
            'discussionId' => $discussionId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Permissions that may be checked: Project.SuggestedEdit.Moderate
     *
     * @param string $project
     * @param string $discussionId
     * @return void
     * @throws GuzzleException
     */
    final public function reopenSuggestedEdit(string $project, string $discussionId): void
    {
        $uri = 'projects/{project}/code-reviews/code-discussions/{discussionId}/reopen-suggested-edit';
        $uriArguments = [
            'project' => $project,
            'discussionId' => $discussionId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return SuggestedEdit
     */
    final public function suggestedEdit(): SuggestedEdit
    {
        return new SuggestedEdit($this->client);
    }
}
