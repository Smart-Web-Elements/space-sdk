<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Documents\Copy;
use Swe\SpaceSDK\Projects\Documents\DeleteForever;
use Swe\SpaceSDK\Projects\Documents\Folders;
use Swe\SpaceSDK\Projects\Documents\Move;
use Swe\SpaceSDK\Projects\Documents\Unarchive;
use Swe\SpaceSDK\Type;

/**
 * Class Documents
 * Generated at 2023-01-12 02:00
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Documents extends AbstractApi
{
    /**
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createDocument(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/documents';
        $required = [
            'name' => Type::String,
            'folder' => Type::String,
            'bodyIn' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $documentId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getDocument(string $project, string $documentId, array $response = []): array
    {
        $uri = 'projects/{project}/documents/{documentId}';
        $uriArguments = [
            'project' => $project,
            'documentId' => $documentId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $project
     * @param string $documentId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateDocument(
        string $project,
        string $documentId,
        array $data = [],
        array $response = [],
    ): array {
        $uri = 'projects/{project}/documents/{documentId}';
        $uriArguments = [
            'project' => $project,
            'documentId' => $documentId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    final public function archiveDocument(string $project, string $documentId): void
    {
        $uri = 'projects/{project}/documents/{documentId}';
        $uriArguments = [
            'project' => $project,
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
