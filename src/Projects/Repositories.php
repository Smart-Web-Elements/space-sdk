<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Repositories\ClassReadonly;
use Swe\SpaceSDK\Projects\Repositories\Find;
use Swe\SpaceSDK\Projects\Repositories\Revisions;
use Swe\SpaceSDK\Type;

/**
 * Class Repositories
 * Generated at 2022-11-15 07:46
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
    ): array {
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

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
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
    ): array {
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
    final public function commits(string $project, string $repository, array $request = [], array $response = []): array
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
}
