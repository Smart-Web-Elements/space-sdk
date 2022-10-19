<?php

namespace Swe\SpaceSDK\Projects\Planning;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Tags
 *
 * @package Swe\SpaceSDK\Projects\Planning
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Tags extends AbstractApi
{
    /**
     * Create a new hierarchical tag in a project.
     *
     * Permissions that may be checked: Project.Issues.ManageTags
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createHierarchicalTag(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/planning/tags';
        $required = [
            'path' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Search existing tags in a project.
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllHierarchicalTags(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/planning/tags';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }
}