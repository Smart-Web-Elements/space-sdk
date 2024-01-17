<?php

namespace Swe\SpaceSDK\Projects\Packages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Packages\Repositories\Access;
use Swe\SpaceSDK\Projects\Packages\Repositories\Cleanup;
use Swe\SpaceSDK\Projects\Packages\Repositories\Connections;
use Swe\SpaceSDK\Projects\Packages\Repositories\Files;
use Swe\SpaceSDK\Projects\Packages\Repositories\Packages;
use Swe\SpaceSDK\Projects\Packages\Repositories\Url;
use Swe\SpaceSDK\Type;

/**
 * Class Repositories
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK\Projects\Packages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Repositories extends AbstractApi
{
    /**
     * Creates a new package repository for a given project ID
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
    final public function createNewRepository(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/packages/repositories';
        $required = [
            'type' => Type::String,
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Gets a list of package repositories for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getRepositories(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/packages/repositories';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Gets a package repository for a given project ID by type and name
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getRepository(string $project, string $repository, array $response = []): ?array
    {
        $uri = 'projects/{project}/packages/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Updates package repository settings for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Admin
     *
     * @param string $project
     * @param string $repository
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateRepository(string $project, string $repository, array $data = []): void
    {
        $uri = 'projects/{project}/packages/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Removes package repository for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Admin
     *
     * @param string $project
     * @param string $repository
     * @return void
     * @throws GuzzleException
     */
    final public function deleteRepository(string $project, string $repository): void
    {
        $uri = 'projects/{project}/packages/repositories/{repository}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Access
     */
    final public function access(): Access
    {
        return new Access($this->client);
    }

    /**
     * @return Cleanup
     */
    final public function cleanup(): Cleanup
    {
        return new Cleanup($this->client);
    }

    /**
     * @return Connections
     */
    final public function connections(): Connections
    {
        return new Connections($this->client);
    }

    /**
     * @return Files
     */
    final public function files(): Files
    {
        return new Files($this->client);
    }

    /**
     * @return Packages
     */
    final public function packages(): Packages
    {
        return new Packages($this->client);
    }

    /**
     * @return Url
     */
    final public function url(): Url
    {
        return new Url($this->client);
    }
}
