<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Packages\Repositories\Packages\Metadata;
use Swe\SpaceSDK\Projects\Packages\Repositories\Packages\Versions;

/**
 * Class Packages
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Packages extends AbstractApi
{
    /**
     * Gets a list of repository packages for a given project ID.
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
    public function getAllPackages(string $project, string $repository, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/packages';
        $required = [
            'query' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Removes all package versions in repository for a given project ID.
     *
     * Permissions that may be checked: PackageRepository.Write
     *
     * @param string $project
     * @param string $repository
     * @param string $packageName
     * @return void
     * @throws GuzzleException
     */
    public function deletePackage(string $project, string $repository, string $packageName): void
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
    public function metadata(): Metadata
    {
        return new Metadata($this->client);
    }

    /**
     * @return Versions
     */
    public function versions(): Versions
    {
        return new Versions($this->client);
    }
}