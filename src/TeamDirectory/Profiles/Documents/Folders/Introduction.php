<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Introduction
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Introduction extends AbstractApi
{
    /**
     * @param string $profile
     * @param string $folder
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    final public function addFolderIntroduction(string $profile, string $folder, string $documentId): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}/introduction/{documentId}';
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
            'documentId' => $documentId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @param string $profile
     * @param string $folder
     * @return void
     * @throws GuzzleException
     */
    final public function removeFolderIntroduction(string $profile, string $folder): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}/introduction';
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
