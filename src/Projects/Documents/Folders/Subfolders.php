<?php

namespace Swe\SpaceSDK\Projects\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Subfolders
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\Projects\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Subfolders extends AbstractApi
{
    /**
     * @param string $project
     * @param string $folder
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function listSubfolders(
        string $project,
        string $folder,
        array $request = [],
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/documents/folders/{folder}/subfolders';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
