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
use Swe\SpaceSDK\Type;

/**
 * Class Documents
 * Generated at 2023-02-07 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Documents extends AbstractApi
{
    /**
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createDocument(string $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents';
        $required = [
            'name' => Type::String,
            'folder' => Type::String,
            'bodyIn' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $profile
     * @param string $documentId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getDocument(string $profile, string $documentId, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $profile
     * @param string $documentId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateDocument(
        string $profile,
        string $documentId,
        array $data = [],
        array $response = [],
    ): array {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $profile
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    final public function archiveDocument(string $profile, string $documentId): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Folders
     */
    final public function folders(): Folders
    {
        return new Folders($this->client);
    }

    /**
     * @return Copy
     */
    final public function copy(): Copy
    {
        return new Copy($this->client);
    }

    /**
     * @return DeleteForever
     */
    final public function deleteForever(): DeleteForever
    {
        return new DeleteForever($this->client);
    }

    /**
     * @return Move
     */
    final public function move(): Move
    {
        return new Move($this->client);
    }

    /**
     * @return Unarchive
     */
    final public function unarchive(): Unarchive
    {
        return new Unarchive($this->client);
    }
}
