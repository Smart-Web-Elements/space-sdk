<?php

namespace Swe\SpaceSDK\AuthModules;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Config
 * Generated at 2022-11-15 07:46
 *
 * @package Swe\SpaceSDK\AuthModules
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Config extends AbstractApi
{
    /**
     * Get authentication configuration
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getConfig(array $response = []): array
    {
        $uri = 'auth-modules/config';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Set authentication configuration
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function putConfig(array $data = []): void
    {
        $uri = 'auth-modules/config';

        $this->client->put($this->buildUrl($uri), $data);
    }

    /**
     * Reset authentication configuration to default
     *
     * Permissions that may be checked: AuthModule.Manage
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function deleteConfig(array $response = []): array
    {
        $uri = 'auth-modules/config';

        return $this->client->delete($this->buildUrl($uri), [], $response);
    }
}
