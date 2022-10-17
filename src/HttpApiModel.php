<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class HttpApiModel
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class HttpApiModel extends AbstractApi
{
    /**
     * Get the HTTP API model that describes the available HTTP APIs.
     *
     * This endpoint doesn't require any permissions.
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getHttpApiModel(array $response): array
    {
        $uri = 'http-api-model';

        return $this->client->get($this->buildUrl($uri), $response);
    }
}