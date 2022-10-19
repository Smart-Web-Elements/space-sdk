<?php

namespace Swe\SpaceSDK\Projects\Repositories\Revisions;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class ExternalChecks
 *
 * @package Swe\SpaceSDK\Projects\Repositories\Revisions
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ExternalChecks extends AbstractApi
{
    /**
     * @param string $project
     * @param string $repository
     * @param string $revision
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function reportExternalCheckStatus(string $project, string $repository, string $revision, array $data): void
    {
        $uri = 'projects/{project}/repositories/{repository}/revisions/{revision}/external-checks';
        $required = [
            'executionStatus' => self::TYPE_STRING,
            'url' => self::TYPE_STRING,
            'externalServiceName' => self::TYPE_STRING,
            'taskName' => self::TYPE_STRING,
            'taskId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'revision' => $revision,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $project
     * @param string $repository
     * @param string $revision
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getExternalChecksForACommit(
        string $project,
        string $repository,
        string $revision,
        array $response = []
    ): array {
        $uri = 'projects/{project}/repositories/{repository}/revisions/{revision}/external-checks';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'revision' => $revision,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }
}