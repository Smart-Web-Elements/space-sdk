<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Access
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Access extends AbstractApi
{
    /**
     * Updates package repository settings for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Admin
     *
     * @param string $project
     * @param string $repository
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getRepositoryOwnAccess(string $project, string $repository, array $response = []): array
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/access';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Updates package repository settings for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Admin
     *
     * @param string $project
     * @param string $repository
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateRepositoryOwnAccess(string $project, string $repository, array $data): void
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/access';
        $required = [
            'accessChange' => [
            ],
            'silent' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
