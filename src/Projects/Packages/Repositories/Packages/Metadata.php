<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories\Packages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Metadata
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories\Packages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Metadata extends AbstractApi
{
    /**
     * Get package metadata in repository for a given project ID.
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getPackageMetadata(
        string $project,
        string $repository,
        string $packageName,
        array $response = []
    ): array {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}/metadata';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'packageName' => $packageName,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Update a package metadata in repository for a given project ID.
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function reportPackageMetadata(
        string $project,
        string $repository,
        string $packageName,
        array $data = []
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
     * .
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
    public function reportPackageVersionMetadata(
        string $project,
        string $repository,
        string $packageName,
        string $packageVersion,
        array $data = []
    ): void {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}/metadata/version:{packageVersion}';
        $required = [
            'pin' => self::TYPE_BOOLEAN,
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