<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories\Cleanup;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Dry
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories\Cleanup
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Dry extends AbstractApi
{
    /**
     * Dry run of cleanup for specified package repository
     *
     * Permissions that may be checked: PackageRepository.Admin
     *
     * @param array $project
     * @param array $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function dryRunRepositoryCleanup(
        array $project,
        array $repository,
        array $data,
        array $response = [],
    ): array {
        $uri = 'projects/{project}/packages/repositories/{repository}/cleanup/dry';
        $required = [
            'retentionParams' => [
                'retainDownloadedOnce' => Type::Boolean,
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }
}
