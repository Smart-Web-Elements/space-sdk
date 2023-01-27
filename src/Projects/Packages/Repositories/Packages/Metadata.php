<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories\Packages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Metadata
 * Generated at 2023-01-27 02:00
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories\Packages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Metadata extends AbstractApi
{
    /**
     * Get package metadata in repository for a given project ID
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getPackageMetadata(
        string $project,
        string $repository,
        string $packageName,
        array $response = [],
    ): ?array {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}/metadata';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'packageName' => $packageName,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update a package metadata in repository for a given project ID
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function reportPackageMetadata(
        string $project,
        string $repository,
        string $packageName,
        array $data = [],
    ): void {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}/metadata';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'packageName' => $packageName,
        ];

        $this->client->put($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Report a package version metadata in repository for a given project ID
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @param string $packageVersion
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function reportPackageVersionMetadata(
        string $project,
        string $repository,
        string $packageName,
        string $packageVersion,
        array $data,
    ): void {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}/metadata/version:{packageVersion}';
        $required = [
            'pin' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'packageName' => $packageName,
            'packageVersion' => $packageVersion,
        ];

        $this->client->put($this->buildUrl($uri, $uriArguments), $data);
    }
}
