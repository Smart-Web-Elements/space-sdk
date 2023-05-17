<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Packages\Repositories\Connections\Publish;

/**
 * Class Connections
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Connections extends AbstractApi
{
    /**
     * Gets a list of remote package repositories for given project
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllRemoteRepositories(string $project, string $repository, array $response = []): array
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/connections';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @return Publish
     */
    final public function publish(): Publish
    {
        return new Publish($this->client);
    }
}
