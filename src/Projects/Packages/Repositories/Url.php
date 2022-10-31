<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Url
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Url extends AbstractApi
{
    /**
     * Gets a package repository URL for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param array $project
     * @param array $repository
     * @param array $response
     * @return string
     * @throws GuzzleException
     */
    final public function getRepositoryUrl(array $project, array $repository): string
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/url';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}
