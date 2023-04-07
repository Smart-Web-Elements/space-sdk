<?php

namespace Swe\SpaceSDK\Projects\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Documents\Folders\Access;
use Swe\SpaceSDK\Projects\Documents\Folders\Documents;
use Swe\SpaceSDK\Projects\Documents\Folders\Introduction;
use Swe\SpaceSDK\Projects\Documents\Folders\Move;
use Swe\SpaceSDK\Projects\Documents\Folders\Subfolders;
use Swe\SpaceSDK\Type;

/**
 * Class Folders
 * Generated at 2023-04-07 02:00
 *
 * @package Swe\SpaceSDK\Projects\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Folders extends AbstractApi
{
    /**
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createFolder(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/documents/folders';
        $required = [
            'name' => Type::String,
            'parentFolder' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $project
     * @param string $folder
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFolder(string $project, string $folder, array $response = []): array
    {
        $uri = 'projects/{project}/documents/folders/{folder}';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $project
     * @param string $folder
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function renameFolder(string $project, string $folder, array $data): void
    {
        $uri = 'projects/{project}/documents/folders/{folder}';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $project
     * @param string $folder
     * @return void
     * @throws GuzzleException
     */
    final public function archiveFolder(string $project, string $folder): void
    {
        $uri = 'projects/{project}/documents/folders/{folder}';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Access
     */
    final public function access(): Access
    {
        return new Access($this->client);
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
