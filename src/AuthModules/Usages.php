<?php

namespace Swe\SpaceSDK\AuthModules;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Usages
 *
 * @package Swe\SpaceSDK\AuthModules
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Usages extends AbstractApi
{
    /**
     * Retrieve a list of authentication module usage count.
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllUsages(array $response = []): array
    {
        $uri = 'auth-modules/usages';

        return $this->client->get($this->buildUrl($uri), $response);
    }
}