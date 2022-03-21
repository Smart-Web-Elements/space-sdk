<?php

namespace Swe\SpaceSDK\Project;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Repository
 *
 * @package Space\Project
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Repository extends AbstractApi
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
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createRepository(array $data, array $response = []): array
    {
        $url = 'projects/{project}/repositories/{repository}';
        $required = [
            'repository' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $project = $this->throwIfKeyIdMissing($data);
        $repository = $data['repository'];
        $urlArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($url, $urlArguments), $data, $response);
    }

    /**
     * @param array $request
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function deleteRepository(array $request): bool
    {
        $url = 'projects/{project}/repositories/{repository}';
        $required = [
            'repository' => 'string',
        ];
        $this->throwIfInvalid($required, $request);
        $project = $this->throwIfKeyIdMissing($request);
        $repository = $request['repository'];
        $urlArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->delete($this->buildUrl($url, $urlArguments));
    }

    /**
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getRepositoryGitRemoteUrl(array $request, array $response = []): array
    {
        $url = 'projects/{project}/repositories/{repository}/url';
        $required = [
            'repository' => 'string',
        ];
        $this->throwIfInvalid($required, $request);
        $project = $this->throwIfKeyIdMissing($request);
        $repository = $request['repository'];
        $urlArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($url, $urlArguments), $response);
    }

    /**
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function listCommitsMatchingQuery(array $request, array $response = []): array
    {
        $url = 'projects/{project}/repositories/{repository}/commits';
        $required = [
            'repository' => 'string',
        ];
        $this->throwIfInvalid($required, $request);
        $project = $this->throwIfKeyIdMissing($request);
        $repository = $request['repository'];
        $urlArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($url, $urlArguments), $request, $response);
    }

    /**
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function commitChangesToRepository(array $request, array $response = []): array
    {
        $url = 'projects/{project}/repositories/{repository}/commit';
        $required = [
            'repository' => 'string',
            'baseCommit' => 'string',
            'targetBranch' => 'string',
            'commitMessage' => 'string',
        ];
        $this->throwIfInvalid($required, $request);
        $project = str_replace('key:', '', str_replace('id:', '', $this->throwIfKeyIdMissing($request)));
        $project = strtolower($project);
        $repository = $request['repository'];
        $urlArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($url, $urlArguments), $request, $response);
    }
}