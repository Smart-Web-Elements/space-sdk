<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories\Connections;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Publish
 * Generated at 2023-10-24 02:15
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories\Connections
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Publish extends AbstractApi
{
    /**
     * Publishes packages to remote repository
     *
     * Permissions that may be checked: PackageRepository.Write2
     *
     * @param string $project
     * @param string $repository
     * @param string $connectionId
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function publishPackagesToRemoteRepository(
        string $project,
        string $repository,
        string $connectionId,
        array $data,
    ): string
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/connections/{connectionId}/publish';
        $required = [
            'source' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'connectionId' => $connectionId,
        ];

        return (string)$this->client->post($this->buildUrl($uri, $uriArguments), $data)[0];
    }

    /**
     * Get list of publishing to remote repository
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @param string $connectionId
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getListOfPublishingToRemoteRepository(
        string $project,
        string $repository,
        string $connectionId,
        array $request = [],
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/connections/{connectionId}/publish';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'connectionId' => $connectionId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
