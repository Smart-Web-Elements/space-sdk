<?php

namespace Swe\SpaceSDK\Projects\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Access
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Access extends AbstractApi
{
    /**
     * @param string $project
     * @param string $folder
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function folderOwnAccessPermissions(string $project, string $folder, array $response = []): array
    {
        $uri = 'projects/{project}/documents/folders/{folder}/access';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $project
     * @param string $folder
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateFolderAccessPermissions(string $project, string $folder, array $data): void
    {
        $uri = 'projects/{project}/documents/folders/{folder}/access';
        $required = [
            'accessChange' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
