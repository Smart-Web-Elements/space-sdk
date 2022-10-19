<?php

namespace Swe\SpaceSDK\Projects\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Subfolders
 *
 * @package Swe\SpaceSDK\Projects\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Subfolders extends AbstractApi
{
    /**
     * @param string $project
     * @param string $folder
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function listSubfolders(string $project, string $folder, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/documents/folders/{folder}/subfolders';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }
}