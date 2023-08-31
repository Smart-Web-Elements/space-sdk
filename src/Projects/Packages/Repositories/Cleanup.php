<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Packages\Repositories\Cleanup\Dry;

/**
 * Class Cleanup
 * Generated at 2023-08-31 02:00
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Cleanup extends AbstractApi
{
    /**
     * Cleanup specified package repository
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
    final public function cleanupRepository(
        string $project,
        string $repository,
        array $data = [],
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/cleanup';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @return Dry
     */
    final public function dry(): Dry
    {
        return new Dry($this->client);
    }
}
