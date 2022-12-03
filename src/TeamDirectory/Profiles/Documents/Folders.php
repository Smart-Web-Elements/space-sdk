<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders\Documents;
use Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders\Introduction;
use Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders\Move;
use Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders\Subfolders;
use Swe\SpaceSDK\Type;

/**
 * Class Folders
 * Generated at 2022-12-03 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Folders extends AbstractApi
{
    /**
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createFolder(string $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders';
        $required = [
            'name' => Type::String,
            'parentFolder' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $profile
     * @param string $folder
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFolder(string $profile, string $folder, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}';
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
    final public function renameFolder(string $profile, string $folder, array $data): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $profile
     * @param string $folder
     * @return void
     * @throws GuzzleException
     */
    final public function archiveFolder(string $profile, string $folder): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}';
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Documents
     */
    final public function documents(): Documents
    {
        return new Documents($this->client);
    }

    /**
     * @return Introduction
     */
    final public function introduction(): Introduction
    {
        return new Introduction($this->client);
    }

    /**
     * @return Move
     */
    final public function move(): Move
    {
        return new Move($this->client);
    }

    /**
     * @return Subfolders
     */
    final public function subfolders(): Subfolders
    {
        return new Subfolders($this->client);
    }
}
