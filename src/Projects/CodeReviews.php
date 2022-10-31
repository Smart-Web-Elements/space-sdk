<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\CodeReviews\Participants;
use Swe\SpaceSDK\Projects\CodeReviews\Revisions;
use Swe\SpaceSDK\Type;

/**
 * Class CodeReviews
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class CodeReviews extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.SuggestedEdit.Create
     *
     * @param array $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createCodeDiscussion(array $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/code-discussions';
        $required = [
            'text' => Type::String,
            'repository' => Type::String,
            'revision' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.Create
     *
     * @param array $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createReviewBasedOnCommitSet(array $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/commit-set-review';
        $required = [
            'repository' => Type::String,
            'revisions' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.Create
     *
     * @param array $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createMergeRequest(array $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/merge-requests';
        $required = [
            'repository' => Type::String,
            'sourceBranch' => Type::String,
            'targetBranch' => Type::String,
            'title' => Type::String,
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
     * @param array $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllCodeReviews(array $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param array $project
     * @param array $reviewId
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getCodeReview(array $project, array $reviewId, array $response = []): ?array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param array $project
     * @param array $reviewId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getReviewDetails(array $project, array $reviewId, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/details';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param array $project
     * @param array $reviewId
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getTheModifiedFilesInCodeReview(
        array $project,
        array $reviewId,
        array $request = [],
        array $response = [],
    ): array {
        $uri = 'projects/{project}/code-reviews/{reviewId}/files';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param array $project
     * @param array $reviewId
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getTheMergeRequestFiles(
        array $project,
        array $reviewId,
        array $request = [],
        array $response = [],
    ): array {
        $uri = 'projects/{project}/code-reviews/{reviewId}/merge-files';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param array $project
     * @param array $reviewId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getSuggestedReviewers(array $project, array $reviewId, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/suggested-reviewers';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

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
    final public function editReviewState(array $project, array $reviewId, array $data): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/state';
        $required = [
            'state' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

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
    final public function editReviewTitle(array $project, array $reviewId, array $data): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/title';
        $required = [
            'title' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View, VcsRepository.Write
     *
     * @param array $project
     * @param array $reviewId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function mergeAMergeRequest(array $project, array $reviewId, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/merge';
        $required = [
            'deleteSourceBranch' => Type::Boolean,
            'mergeMode' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->put($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View, VcsRepository.Write
     *
     * @param array $project
     * @param array $reviewId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function rebaseAMergeRequest(array $project, array $reviewId, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/rebase';
        $required = [
            'deleteSourceBranch' => Type::Boolean,
            'rebaseMode' => Type::String,
            'squash' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->put($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @return Participants
     */
    final public function participants(): Participants
    {
        return new Participants($this->client);
    }

    /**
     * @return Revisions
     */
    final public function revisions(): Revisions
    {
        return new Revisions($this->client);
    }
}
