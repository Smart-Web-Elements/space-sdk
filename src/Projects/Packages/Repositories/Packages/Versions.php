<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories\Packages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Versions
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories\Packages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Versions extends AbstractApi
{
    /**
     * Gets a list of repository package versions for a given project ID
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
    final public function getAllPackageVersions(
        string $project,
        string $repository,
        string $packageName,
        array $request,
        array $response = [],
    ): array {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}/versions';
        $required = [
            'query' => Type::String,
            'sortColumn' => Type::String,
            'sortOrder' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'packageName' => $packageName,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Gets a details for repository package version for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @param string $packageVersion
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getPackageVersionDetails(
        string $project,
        string $repository,
        string $packageName,
        string $packageVersion,
        array $response = [],
    ): ?array {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}/versions/version:{packageVersion}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'packageName' => $packageName,
            'packageVersion' => $packageVersion,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Removes a package version in repository for a given project ID
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
    final public function deletePackageVersion(
        string $project,
        string $repository,
        string $packageName,
        string $packageVersion,
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
