<?php

namespace Swe\SpaceSDK\Administration;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Support
 * Generated at 2023-03-09 02:00
 *
 * @package Swe\SpaceSDK\Administration
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Support extends AbstractApi
{
    /**
     * Create a profile for support
     *
     * Permissions that may be checked: Superadmin
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function createSupport(array $response = []): array
    {
        $uri = 'administration/support';

        return $this->client->post($this->buildUrl($uri), [], [], $response);
    }
}
