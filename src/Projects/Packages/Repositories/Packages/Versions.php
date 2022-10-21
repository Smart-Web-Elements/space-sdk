<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories\Packages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Versions
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories\Packages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Versions extends AbstractApi
{
    /**
     * Gets a list of repository package versions for a given project ID.
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllPackageVersions(
        string $project,
        string $repository,
        string $packageName,
        array $request,
        array $response = []
    ): array {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}/versions';
        $required = [
            'query' => self::TYPE_STRING,
            'sortColumn' => self::TYPE_STRING,
            'sortOrder' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'packageName' => $packageName,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Gets a details for repository package version for a given project ID.
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @param string $packageVersion
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getPackageVersionDetails(
        string $project,
        string $repository,
        string $packageName,
        string $packageVersion,
        array $response = []
    ): array {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}/versions/version:{packageVersion}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'packageName' => $packageName,
            'packageVersion' => $packageVersion,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Gets a details for repository package version for a given project ID.
     *
     * Permissions that may be checked: PackageRepository.Write
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @param string $packageVersion
     * @return void
     * @throws GuzzleException
     */
    public function deletePackageVersion(
        string $project,
        string $repository,
        string $packageName,
        string $packageVersion
    ): void {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}/versions/version:{packageVersion}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'packageName' => $packageName,
            'packageVersion' => $packageVersion,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}