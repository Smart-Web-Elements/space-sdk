<?php

namespace Swe\SpaceSDK\Project;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Tags
 *
 * @package Swe\SpaceSDK\Project
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Tags extends AbstractApi
{
    /**
     * Track a tag has been accessed.
     *
     * @param string $tag
     * @return void
     * @throws GuzzleException
     */
    public function trackTagAccess(string $tag): void
    {
        $uri = 'projects/tags/track-access';
        $data = [
            'tag' => $tag,
        ];

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * List all tags, mapped to the number of projects they are used in.
     *
     * Permissions that may be checked: Project.View
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllTags(array $response = []): array
    {
        $uri = 'projects/tags';

        return $this->client->get($this->buildUrl($uri), $response);
    }
}