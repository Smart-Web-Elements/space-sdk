<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories\Cleanup;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Dry
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories\Cleanup
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Dry extends AbstractApi
{
    /**
     * Dry run of cleanup for specified package repository.
     *
     * Permissions that may be checked: PackageRepository.Admin
     *
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function dryRunRepositoryCleanup(
        string $project,
        string $repository,
        array $data,
        array $response = []
    ): array {
        $uri = 'projects/{project}/packages/repositories/{repository}/cleanup/dry';
        $required = [
            'retentionParams' => [
                'retainDownloadedOnce' => self::TYPE_BOOLEAN,
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }
}