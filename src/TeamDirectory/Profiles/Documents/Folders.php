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
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Folders extends AbstractApi
{
    /**
     * @param array $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createFolder(array $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders';
        $required = [
            'name' => Type::String,
            'parentFolder' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param array $profile
     * @param array $folder
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFolder(array $profile, array $folder, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}';
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param array $profile
     * @param array $folder
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function renameFolder(array $profile, array $folder, array $data): void
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
     * @param array $profile
     * @param array $folder
     * @return void
     * @throws GuzzleException
     */
    final public function archiveFolder(array $profile, array $folder): void
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
