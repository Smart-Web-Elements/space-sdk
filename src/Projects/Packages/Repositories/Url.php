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
class Url extends AbstractApi
{
    /**
     * Gets a package repository URL for a given project ID.
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @return string
     * @throws GuzzleException
     */
    public function getRepositoryUrl(string $project, string $repository): string
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/url';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}