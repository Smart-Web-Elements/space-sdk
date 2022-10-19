<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Packages\Repositories\Cleanup\Dry;

/**
 * Class Cleanup
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Cleanup extends AbstractApi
{
    /**
     * Cleanup specified package repository.
     *
     * Permissions that may be checked: PackageRepository.Admin
     *
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function cleanupRepository(
        string $project,
        string $repository,
        array $data = [],
        array $response = []
    ): array {
        $uri = 'projects/{project}/packages/repositories/{repository}/cleanup';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * @return Dry
     */
    public function dry(): Dry
    {
        return new Dry($this->client);
    }
}