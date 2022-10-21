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
class Introduction extends AbstractApi
{
    /**
     * @param string $project
     * @param string $folder
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    public function addFolderIntroduction(string $project, string $folder, string $documentId): void
    {
        $uri = 'projects/{project}/documents/folders/{folder}/introduction/{documentId}';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
            'documentId' => $documentId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @param string $project
     * @param string $folder
     * @return void
     * @throws GuzzleException
     */
    public function removeFolderIntroduction(string $project, string $folder): void
    {
        $uri = 'projects/{project}/documents/folders/{folder}/introduction';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}