<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Introduction
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Introduction extends AbstractApi
{
    /**
     * @param array $profile
     * @param array $folder
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    final public function addFolderIntroduction(array $profile, array $folder, string $documentId): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}/introduction/{documentId}';
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
            'documentId' => $documentId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * @param array $profile
     * @param array $folder
     * @return void
     * @throws GuzzleException
     */
    final public function removeFolderIntroduction(array $profile, array $folder): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}/introduction';
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
