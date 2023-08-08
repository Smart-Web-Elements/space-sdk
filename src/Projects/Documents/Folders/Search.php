<?php

namespace Swe\SpaceSDK\Projects\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Search
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\Projects\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Search extends AbstractApi
{
    /**
     * Executes search for project documents and folders in specified folder
     *
     * @param string $project
     * @param string $folder
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function searchDocumentsAndFolders(
        string $project,
        string $folder,
        array $request,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/documents/folders/{folder}/search';
        $required = [
            'query' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
