<?php

namespace Swe\SpaceSDK\Project;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Project\Repositories\Find;
use Swe\SpaceSDK\Project\Repositories\RepositoryReadonly;
use Swe\SpaceSDK\Project\Repositories\Revisions;

/**
 * Class Repositories
 *
 * @package Swe\SpaceSDK\Project
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Repositories extends AbstractApi
{
    const GIT_FILE_CONTENT_TEXT = 'GitFileContent.Text';
    const GIT_FILE_CONTENT_BASE64 = 'GitFileContent.Base64';
    const GIT_FILE_CONTENT_DELETED = 'GitFileContent.Deleted';
    const GIT_FILE_CONTENT = [
        'Text' => self::GIT_FILE_CONTENT_TEXT,
        'Base64' => self::GIT_FILE_CONTENT_BASE64,
        'Deleted' => self::GIT_FILE_CONTENT_DELETED,
    ];

    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function createNewRepository(
        string $project,
        string $repository,
        array $data = [],
        array $response = []
    ): array {
        $uri = 'projects/{project}/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
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
    public function commitChangesToRepository(
        string $project,
        string $repository,
        array $request,
        array $response = []
    ): array {
        $uri = 'projects/{project}/repositories/{repository}/commit';
        $required = [
            'baseCommit' => self::TYPE_STRING,
            'targetBranch' => self::TYPE_STRING,
            'commitMessage' => self::TYPE_STRING,
            'files' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Not available in multi-org mode.
     *
     * @param string $project
     * @param string $repository
     * @return void
     * @throws GuzzleException
     */
    public function invokeGarbageCollectionOnRepository(string $project, string $repository): void
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
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function listTheHeadsWhichContainsGivenCommit(
        string $project,
        string $repository,
        array $request,
        array $response = []
    ): array {
        $uri = 'projects/{project}/repositories/{repository}/commit-branches';
        $required = [
            'commit' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function listCommitsMatchingQuery(
        string $project,
        string $repository,
        array $request = [],
        array $response = []
    ): array {
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
    public function listFilesInDirectory(
        string $project,
        string $repository,
        array $request,
        array $response = []
    ): array {
        $uri = 'projects/{project}/repositories/{repository}/files';
        $required = [
            'commit' => self::TYPE_STRING,
            'path' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getRepositoryGitRemoteUrl(string $project, string $repository, array $response = []): array
    {
        $uri = 'projects/{project}/repositories/{repository}/url';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @param string $project
     * @param string $repository
     * @return void
     * @throws GuzzleException
     */
    public function deleteRepository(string $project, string $repository): void
    {
        $uri = 'projects/{project}/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Find
     */
    public function find(): Find
    {
        return new Find($this->client);
    }

    /**
     * @return RepositoryReadonly
     */
    public function readonly(): RepositoryReadonly
    {
        return new RepositoryReadonly($this->client);
    }

    /**
     * @return Revisions
     */
    public function revisions(): Revisions
    {
        return new Revisions($this->client);
    }
}