<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Access
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Access extends AbstractApi
{
    /**
     * @param string $profile
     * @param string $folder
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function folderOwnAccessPermissions(string $profile, string $folder, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}/access';
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $profile
     * @param string $folder
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateFolderAccessPermissions(string $profile, string $folder, array $data): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}/access';
        $required = [
            'accessChange' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
