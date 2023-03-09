<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Permissions
 * Generated at 2023-03-09 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Permissions extends AbstractApi
{
    /**
     * @param array $data
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function checkPermission(array $data): bool
    {
        $uri = 'permissions/check-permission';
        $required = [
            'principal' => Type::String,
            'uniqueRightCode' => Type::String,
            'target' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);

        return (bool)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllPermissions(array $response = []): array
    {
        $uri = 'permissions';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }
}
