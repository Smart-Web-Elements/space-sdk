<?php

namespace Swe\SpaceSDK\Projects\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Documents
 * Generated at 2022-12-15 11:10
 *
 * @package Swe\SpaceSDK\Projects\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Documents extends AbstractApi
{
    /**
     * @param string $project
     * @param string $folder
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function listDocumentsInFolder(
        string $project,
        string $folder,
        array $request = [],
        array $response = [],
    ): array {
        $uri = 'projects/{project}/documents/folders/{folder}/documents';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
