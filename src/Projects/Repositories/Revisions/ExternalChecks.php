<?php

namespace Swe\SpaceSDK\Projects\Repositories\Revisions;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class ExternalChecks
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK\Projects\Repositories\Revisions
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ExternalChecks extends AbstractApi
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
    final public function reportExternalCheckStatus(
        string $project,
        string $repository,
        string $revision,
        array $data,
    ): void
    {
        $uri = 'projects/{project}/repositories/{repository}/revisions/{revision}/external-checks';
        $required = [
            'executionStatus' => Type::String,
            'url' => Type::String,
            'externalServiceName' => Type::String,
            'taskName' => Type::String,
            'taskId' => Type::String,
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
    final public function getExternalChecksForACommit(
        string $project,
        string $repository,
        string $revision,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/repositories/{repository}/revisions/{revision}/external-checks';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'revision' => $revision,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
