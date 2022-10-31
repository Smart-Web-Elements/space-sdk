<?php

namespace Swe\SpaceSDK\Projects\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Introduction
 *
 * @package Swe\SpaceSDK\Projects\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Introduction extends AbstractApi
{
    /**
     * @param array $project
     * @param array $folder
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    final public function addFolderIntroduction(array $project, array $folder, string $documentId): void
    {
        $uri = 'projects/{project}/documents/folders/{folder}/introduction/{documentId}';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
            'documentId' => $documentId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * @param array $project
     * @param array $folder
     * @return void
     * @throws GuzzleException
     */
    final public function removeFolderIntroduction(array $project, array $folder): void
    {
        $uri = 'projects/{project}/documents/folders/{folder}/introduction';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
