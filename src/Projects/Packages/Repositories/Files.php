<?php

namespace Swe\SpaceSDK\Projects\Packages\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Files
 * Generated at 2023-03-09 02:00
 *
 * @package Swe\SpaceSDK\Projects\Packages\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Files extends AbstractApi
{
    /**
     * Gets a list of repository files for a given project ID in parent folder
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getListOfFiles(
        string $project,
        string $repository,
        array $request = [],
        array $response = [],
    ): array {
        $uri = 'projects/{project}/packages/repositories/{repository}/files';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Gets a details for repository file for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param string $repository
     * @param string $filePath
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getFileDetails(
        string $project,
        string $repository,
        string $filePath,
        array $response = [],
    ): ?array {
        $uri = 'projects/{project}/packages/repositories/{repository}/files/name:{filePath}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'filePath' => $filePath,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Removes a folder in repository for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Write
     *
     * @param string $project
     * @param string $repository
     * @param string $folderPath
     * @return void
     * @throws GuzzleException
     */
    final public function deleteFolder(string $project, string $repository, string $folderPath): void
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/files/folder:{folderPath}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'folderPath' => $folderPath,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Removes a file in repository for a given project ID
     *
     * Permissions that may be checked: PackageRepository.Write
     *
     * @param string $project
     * @param string $repository
     * @param string $filePath
     * @return void
     * @throws GuzzleException
     */
    final public function deleteFile(string $project, string $repository, string $filePath): void
    {
        $uri = 'projects/{project}/packages/repositories/{repository}/files/name:{filePath}';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'filePath' => $filePath,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
