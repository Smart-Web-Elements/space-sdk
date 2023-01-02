<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class HttpApiModel
 * Generated at 2023-01-02 09:05
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
