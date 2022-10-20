<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Subfolders
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Subfolders extends AbstractApi
{
    /**
     * @param string $profile
     * @param string $folder
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function listSubFolders(string $profile, string $folder, array $request = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}/subfolders';
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }
}