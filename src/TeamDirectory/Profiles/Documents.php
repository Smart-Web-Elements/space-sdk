<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Copy;
use Swe\SpaceSDK\TeamDirectory\Profiles\Documents\DeleteForever;
use Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders;
use Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Move;
use Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Unarchive;

/**
 * Class Documents
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Documents extends AbstractApi
{
    /**
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createDocument(string $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents';
        $required = [
            'name' => self::TYPE_STRING,
            'folder' => self::TYPE_STRING,
            'bodyIn' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * @param string $profile
     * @param string $documentId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getDocument(string $profile, string $documentId, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @param string $profile
     * @param string $documentId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updateDocument(string $profile, string $documentId, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * @param string $profile
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    public function archiveDocument(string $profile, string $documentId): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Copy
     */
    public function copy(): Copy
    {
        return new Copy($this->client);
    }

    /**
     * @return DeleteForever
     */
    public function deleteForever(): DeleteForever
    {
        return new DeleteForever($this->client);
    }

    /**
     * @return Folders
     */
    public function folders(): Folders
    {
        return new Folders($this->client);
    }

    /**
     * @return Move
     */
    public function move(): Move
    {
        return new Move($this->client);
    }

    /**
     * @return Unarchive
     */
    public function unarchive(): Unarchive
    {
        return new Unarchive($this->client);
    }
}