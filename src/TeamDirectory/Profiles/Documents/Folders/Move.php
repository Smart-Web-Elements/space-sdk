<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Move
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Move extends AbstractApi
{
    /**
     * @param string $profile
     * @param string $folder
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function moveFolder(string $profile, string $folder, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}/move';
        $required = [
            'parentFolder' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }
}