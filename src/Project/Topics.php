<?php

namespace Swe\SpaceSDK\Project;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Topics
 *
 * @package Swe\SpaceSDK\Project
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Topics extends AbstractApi
{
    /**
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createTopic(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/topics';
        $required = [
            'name' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function removeTopics(string $project, array $data): void
    {
        $uri = 'projects/{project}/topics/remove-topics';
        $required = [
            'ids' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function setResponsible(string $project, array $data): void
    {
        $uri = 'projects/{project}/topics/set-responsible';
        $required = [
            'topicId' => self::TYPE_STRING,
            'responsible' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getTopic(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/topics';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @param string $project
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updateTopic(string $project, string $id, array $data = [], array $response = []): array
    {
        $uri = 'projects/{project}/topics/{id}';
        $uriArguments = [
            'project' => $project,
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }
}