<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class HttpApiModel
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class HttpApiModel extends AbstractApi
{
    /**
     * Get the HTTP API model that describes the available HTTP APIs
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getHttpApiModel(array $response = []): array
    {
        $uri = 'http-api-model';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }
}
