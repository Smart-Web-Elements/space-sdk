<?php

namespace Swe\SpaceSDK\AuthModules;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Usages
 * Generated at 2023-02-07 02:00
 *
 * @package Swe\SpaceSDK\AuthModules
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Usages extends AbstractApi
{
    /**
     * Retrieve a list of authentication module usage count
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllUsages(array $response = []): array
    {
        $uri = 'auth-modules/usages';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }
}
