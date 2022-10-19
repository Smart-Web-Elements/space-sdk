<?php

namespace Swe\SpaceSDK\Projects\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Documents\Folders\Documents;
use Swe\SpaceSDK\Projects\Documents\Folders\Introduction;
use Swe\SpaceSDK\Projects\Documents\Folders\Move;
use Swe\SpaceSDK\Projects\Documents\Folders\Subfolders;

/**
 * Class Folders
 *
 * @package Swe\SpaceSDK\Projects\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Folders extends AbstractApi
{
    /**
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createFolder(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/documents/folders';
        $required = [
            'name' => self::TYPE_STRING,
            'parentFolder' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * @param string $project
     * @param string $folder
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getFolder(string $project, string $folder, array $response = []): array
    {
        $uri = 'projects/{project}/documents/folders/{folder}';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @param string $project
     * @param string $folder
     * @param string $name
     * @return void
     * @throws GuzzleException
     */
    public function renameFolder(string $project, string $folder, string $name): void
    {
        $uri = 'projects/{project}/documents/folders/{folder}';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];
        $data = [
            'name' => $name,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $project
     * @param string $folder
     * @return void
     * @throws GuzzleException
     */
    public function archiveFolder(string $project, string $folder): void
    {
        $uri = 'projects/{project}/documents/folders/{folder}';
        $uriArguments = [
            'project' => $project,
            'folder' => $folder,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Documents
     */
    public function documents(): Documents
    {
        return new Documents($this->client);
    }

    /**
     * @return Introduction
     */
    public function introduction(): Introduction
    {
        return new Introduction($this->client);
    }

    /**
     * @return Move
     */
    public function move(): Move
    {
        return new Move($this->client);
    }

    /**
     * @return Subfolders
     */
    public function subfolders(): Subfolders
    {
        return new Subfolders($this->client);
    }
}