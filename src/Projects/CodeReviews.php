<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\CodeReviews\CodeDiscussions;
use Swe\SpaceSDK\Projects\CodeReviews\Participants;
use Swe\SpaceSDK\Projects\CodeReviews\Revisions;
use Swe\SpaceSDK\Projects\CodeReviews\SafeMerge;
use Swe\SpaceSDK\Projects\CodeReviews\UnboundDiscussions;
use Swe\SpaceSDK\Type;

/**
 * Class CodeReviews
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class CodeReviews extends AbstractApi
{
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
    final public function createReviewBasedOnCommitSet(string $project, array $data, array $response = []): array
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
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createMergeRequest(string $project, array $data, array $response = []): array
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
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllCodeReviews(string $project, array $request = [], array $response = []): array
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
     * @param string $project
     * @param string $reviewId
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getCodeReview(string $project, string $reviewId, array $response = []): ?array
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
     * @param string $project
     * @param string $reviewId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getReviewDetails(string $project, string $reviewId, array $response = []): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/details';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * List files changed in commits under code review
     *
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param string $project
     * @param string $reviewId
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getTheModifiedFilesInCodeReview(
        string $project,
        string $reviewId,
        array $request = [],
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/files';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * List files in merge request which will be merged into target branch
     *
     * Permissions that may be checked: Project.CodeReview.View
     *
     * @param string $project
     * @param string $reviewId
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getTheMergeRequestFiles(
        string $project,
        string $reviewId,
        array $request = [],
        array $response = [],
    ): array
    {
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
     * @param string $project
     * @param string $reviewId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getSuggestedReviewers(string $project, string $reviewId, array $response = []): array
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
     * @param string $project
     * @param string $reviewId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function editReviewDescription(string $project, string $reviewId, array $data): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/description';
        $required = [
            'description' => Type::String,
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
     * @return void
     * @throws GuzzleException
     */
    final public function makeReviewReadOnly(string $project, string $reviewId): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/make-read-only';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments));
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
    final public function editReviewState(string $project, string $reviewId, array $data): void
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
     * @param string $project
     * @param string $reviewId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function editReviewTitle(string $project, string $reviewId, array $data): void
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
     * @param string $project
     * @param string $reviewId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function mergeMergeRequest(
        string $project,
        string $reviewId,
        array $data,
        array $response = [],
    ): array
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
     * @param string $project
     * @param string $reviewId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function rebaseMergeRequest(
        string $project,
        string $reviewId,
        array $data,
        array $response = [],
    ): array
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
     * @return CodeDiscussions
     */
    final public function codeDiscussions(): CodeDiscussions
    {
        return new CodeDiscussions($this->client);
    }

    /**
     * @return SafeMerge
     */
    final public function safeMerge(): SafeMerge
    {
        return new SafeMerge($this->client);
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

    /**
     * @return UnboundDiscussions
     */
    final public function unboundDiscussions(): UnboundDiscussions
    {
        return new UnboundDiscussions($this->client);
    }
}
