<?php

namespace Swe\SpaceSDK\Projects\Packages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Packages\Repositories\Cleanup;
use Swe\SpaceSDK\Projects\Packages\Repositories\Connections;
use Swe\SpaceSDK\Projects\Packages\Repositories\Files;
use Swe\SpaceSDK\Projects\Packages\Repositories\Packages;
use Swe\SpaceSDK\Projects\Packages\Repositories\Url;

/**
 * Class Repositories
 *
 * @package Swe\SpaceSDK\Projects\Packages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Repositories extends AbstractApi
{
    /**
     * Creates a new package repository for a given project ID.
     *
     * Permissions that may be checked: PackageRepository.Create
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createNewRepository(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/packages/repositories';
        $required = [
            'type' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Gets a list of package repositories for a given project ID.
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getRepositories(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/packages/repositories';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Gets a package repository for a given project ID by type and name.
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getRepository(string $project, string $repository, array $response = []): array
    {
        $uri = 'projects/{project}/packages/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Updates package repository settings for a given project ID.
     *
     * Permissions that may be checked: PackageRepository.Admin
     *
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return void
     * @throws GuzzleException
     */
    public function updateRepository(string $project, string $repository, array $data = [], array $response = []): void
    {
        $uri = 'projects/{project}/packages/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Removes package repository for a given project ID.
     *
     * Permissions that may be checked: PackageRepository.Admin
     *
     * @param string $project
     * @param string $repository
     * @return void
     * @throws GuzzleException
     */
    public function deleteRepository(string $project, string $repository): void
    {
        $uri = 'projects/{project}/packages/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Cleanup
     */
    public function cleanup(): Cleanup
    {
        return new Cleanup($this->client);
    }

    /**
     * @return Connections
     */
    public function connections(): Connections
    {
        return new Connections($this->client);
    }

    /**
     * @return Files
     */
    public function files(): Files
    {
        return new Files($this->client);
    }

    /**
     * @return Packages
     */
    public function packages(): Packages
    {
        return new Packages($this->client);
    }

    /**
     * @return Url
     */
    public function url(): Url
    {
        return new Url($this->client);
    }
}