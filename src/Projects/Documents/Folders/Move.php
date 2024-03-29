<?php

namespace Swe\SpaceSDK\Projects\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Move
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Move extends AbstractApi
{
    /**
     * @param string $project
     * @param string $folder
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function moveFolder(string $project, string $folder, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/documents/folders/{folder}/move';
        $required = [
            'parentFolder' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }
}
