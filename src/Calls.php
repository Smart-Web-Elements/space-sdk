<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Calls
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Calls extends AbstractApi
{
    /**
     * @param array $data
     * @param array $response
     * @return array
     * @throws Exception\MissingArgumentException
     * @throws GuzzleException
     */
    public function createCall(array $data, array $response): array
    {
        $uri = 'calls';
        $required = [
            'participants' => self::TYPE_ARRAY,
            'private' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }
}