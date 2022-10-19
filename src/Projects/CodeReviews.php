<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\CodeReviews\Participants;
use Swe\SpaceSDK\Projects\CodeReviews\Revisions;

/**
 * Class CodeReviews
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class CodeReviews extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.SuggestedEdit.Create
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createCodeDiscussion(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/code-discussions';
        $required = [
            'text' => self::TYPE_STRING,
            'repository' => self::TYPE_STRING,
            'revision' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.Create
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createReviewBasedOnCommitSet(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/commit-set-review';
        $required = [
            'repository' => self::TYPE_STRING,
            'revisions' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.Create
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createMergeRequest(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/merge-requests';
        $required = [
            'repository' => self::TYPE_STRING,
            'sourceBranch' => self::TYPE_STRING,
            'targetBranch' => self::TYPE_STRING,
            'title' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllCodeReviews(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param string $project
     * @param string $reviewId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getCodeReview(string $project, string $reviewId, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param string $project
     * @param string $reviewId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getReviewDetails(string $project, string $reviewId, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/details';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param string $project
     * @param string $reviewId
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getTheModifiedFilesInCodeReview(
        string $project,
        string $reviewId,
        array $request = [],
        array $response = []
    ): array {
        $uri = 'projects/{project}/code-reviews/{reviewId}/files';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param string $project
     * @param string $reviewId
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getTheMergeRequestFiles(
        string $project,
        string $reviewId,
        array $request = [],
        array $response = []
    ): array {
        $uri = 'projects/{project}/code-reviews/{reviewId}/merge-files';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param string $project
     * @param string $reviewId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getSuggestedReviewers(string $project, string $reviewId, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/suggested-reviewers';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

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
    public function editReviewState(string $project, string $reviewId, array $data): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/state';
        $required = [
            'state' => self::TYPE_STRING,
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
     * @param string $project
     * @param string $reviewId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function editReviewTitle(string $project, string $reviewId, array $data): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/title';
        $required = [
            'title' => self::TYPE_STRING,
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
     * @param string $project
     * @param string $reviewId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function mergeAMergeRequest(string $project, string $reviewId, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/merge';
        $required = [
            'deleteSourceBranch' => self::TYPE_BOOLEAN,
            'mergeMode' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->put($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Permissions that may be checked: Project.CodeReview.View, VcsRepository.Write
     *
     * @param string $project
     * @param string $reviewId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function rebaseAMergeRequest(string $project, string $reviewId, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/rebase';
        $required = [
            'deleteSourceBranch' => self::TYPE_BOOLEAN,
            'rebaseMode' => self::TYPE_STRING,
            'squash' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->put($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * @return Participants
     */
    public function participants(): Participants
    {
        return new Participants($this->client);
    }

    /**
     * @return Revisions
     */
    public function revisions(): Revisions
    {
        return new Revisions($this->client);
    }
}