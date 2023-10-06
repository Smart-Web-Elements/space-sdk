<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Packages\Repositories\Packages\Metadata;
use Swe\SpaceSDK\Projects\Packages\Repositories\Packages\Versions;
use Swe\SpaceSDK\Type;

/**
 * Class Packages
 * Generated at 2023-10-06 07:26
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Packages extends AbstractApi
{
    /**
     * Gets a list of repository packages for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllPackages(
        string $project,
        string $repository,
        array $request,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages';
        $required = [
            'query' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Removes all package versions in repository for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Delete
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @return void
     * @throws GuzzleException
     */
    final public function deletePackage(string $project, string $repository, string $packageName): void
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages/name:{packageName}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'packageName' => $packageName,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Metadata
     */
    final public function metadata(): Metadata
    {
        return new Metadata($this->client);
    }

    /**
     * @return Versions
     */
    final public function versions(): Versions
    {
        return new Versions($this->client);
    }
}
