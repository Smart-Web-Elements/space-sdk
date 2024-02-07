<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Tags
 * Generated at 2024-02-07 02:00
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Tags extends AbstractApi
{
    /**
     * Track a tag has been accessed
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function trackTagAccess(array $data): void
    {
        $uri = 'projects/tags/track-access';
        $required = [
            'tag' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * List all tags, mapped to the number of projects they are used in
     *
     * Permissions that may be checked: Project.View
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllTags(array $response = []): array
    {
        $uri = 'projects/tags';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }
}
