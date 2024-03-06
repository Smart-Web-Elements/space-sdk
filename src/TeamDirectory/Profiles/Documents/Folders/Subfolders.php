<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Subfolders
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Subfolders extends AbstractApi
{
    /**
     * @param string $profile
     * @param string $folder
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function listSubfolders(
        string $profile,
        string $folder,
        array $request = [],
        array $response = [],
    ): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}/subfolders';
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
