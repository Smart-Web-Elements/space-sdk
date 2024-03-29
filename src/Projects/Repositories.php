<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Repositories\ClassReadonly;
use Swe\SpaceSDK\Projects\Repositories\DefaultBranch;
use Swe\SpaceSDK\Projects\Repositories\Find;
use Swe\SpaceSDK\Projects\Repositories\Revisions;
use Swe\SpaceSDK\Projects\Repositories\Settings;
use Swe\SpaceSDK\Type;

/**
 * Class Repositories
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Repositories extends AbstractApi
{
    /**
     * @return Find
     */
    final public function find(): Find
    {
        return new Find($this->client);
    }

    /**
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function testRemoteConnection(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/repositories/test-connection';
        $required = [
            'remote' => [
                'url' => Type::String,
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function createNewRepository(
        string $project,
        string $repository,
        array $data = [],
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function cherryPickCommit(
        string $project,
        string $repository,
        array $data,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/cherry-pick-commit';
        $required = [
            'commit' => Type::String,
            'targetBranch' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function commit(string $project, string $repository, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/repositories/{repository}/commit';
        $required = [
            'baseCommit' => Type::String,
            'targetBranch' => Type::String,
            'commitMessage' => Type::String,
            'files' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function deleteBranch(string $project, string $repository, array $data): void
    {
        $uri = 'projects/{project}/repositories/{repository}/delete-branch';
        $required = [
            'branch' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setRepositoryDescription(string $project, string $repository, array $data): void
    {
        $uri = 'projects/{project}/repositories/{repository}/description';
        $required = [
            'description' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $project
     * @param string $repository
     * @return void
     * @throws GuzzleException
     */
    final public function gc(string $project, string $repository): void
    {
        $uri = 'projects/{project}/repositories/{repository}/gc';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setHead(string $project, string $repository, array $data): void
    {
        $uri = 'projects/{project}/repositories/{repository}/head';
        $required = [
            'head' => Type::String,
            'target' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function mergeBranch(string $project, string $repository, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/repositories/{repository}/merge-branch';
        $required = [
            'sourceBranch' => Type::String,
            'mergeMode' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function migrateRepository(
        string $project,
        string $repository,
        array $data,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/migrate';
        $required = [
            'description' => Type::String,
            'remote' => [
                'url' => Type::String,
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function rebaseBranch(string $project, string $repository, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/repositories/{repository}/rebase-branch';
        $required = [
            'sourceBranch' => Type::String,
            'rebaseMode' => Type::String,
            'squash' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getRepositoryInfo(string $project, string $repository, array $response = []): array
    {
        $uri = 'projects/{project}/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAdditionalRepositoryInfo(
        string $project,
        string $repository,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/additional-info';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function changes(string $project, string $repository, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/repositories/{repository}/changes';
        $required = [
            'commit' => Type::String,
            'limit' => Type::Integer,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function commitBranches(
        string $project,
        string $repository,
        array $request,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/commit-branches';
        $required = [
            'commit' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function commits(
        string $project,
        string $repository,
        array $request = [],
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/commits';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function files(string $project, string $repository, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/repositories/{repository}/files';
        $required = [
            'commit' => Type::String,
            'path' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getHeads(
        string $project,
        string $repository,
        array $request = [],
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/heads';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getInlineMergeDiff(
        string $project,
        string $repository,
        array $request,
        array $response = [],
    ): ?array
    {
        $uri = 'projects/{project}/repositories/{repository}/inline-merge-diff';
        $required = [
            'entryType' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function mergePreview(
        string $project,
        string $repository,
        array $request,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/merge-preview';
        $required = [
            'sourceBranch' => Type::String,
            'targetBranch' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Dry run merge source branch into target without modifying the repository. Please note that conflicting status is based on per-file analysis, so it may not be accurate on too diverged branches.
     *
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function mergePreviewStatus(
        string $project,
        string $repository,
        array $request,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/merge-preview-status';
        $required = [
            'sourceBranch' => Type::String,
            'targetBranch' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Extracts head prefix and branch. `path` can contain a branch name or a revision, following by file path.
     *
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function parseHeadPrefix(
        string $project,
        string $repository,
        array $request,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/parse-head-prefix';
        $required = [
            'path' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getFileTextContent(
        string $project,
        string $repository,
        array $request,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/text-content';
        $required = [
            'commit' => Type::String,
            'path' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function url(string $project, string $repository, array $response = []): array
    {
        $uri = 'projects/{project}/repositories/{repository}/url';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @return void
     * @throws GuzzleException
     */
    final public function deleteRepository(string $project, string $repository): void
    {
        $uri = 'projects/{project}/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return DefaultBranch
     */
    final public function defaultBranch(): DefaultBranch
    {
        return new DefaultBranch($this->client);
    }

    /**
     * @return ClassReadonly
     */
    final public function classReadonly(): ClassReadonly
    {
        return new ClassReadonly($this->client);
    }

    /**
     * @return Revisions
     */
    final public function revisions(): Revisions
    {
        return new Revisions($this->client);
    }

    /**
     * @return Settings
     */
    final public function settings(): Settings
    {
        return new Settings($this->client);
    }
}
