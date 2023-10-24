<?php

namespace Swe\SpaceSDK\AuthModules\ThrottledLogins;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class OrgStatus
 * Generated at 2023-10-24 02:15
 *
 * @package Swe\SpaceSDK\AuthModules\ThrottledLogins
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class OrgStatus extends AbstractApi
{
    /**
     * Returns date and time until which the organization are throttled
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getOrganizationThrottlingStatus(array $response = []): array
    {
        $uri = 'auth-modules/throttled-logins/org-status';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Resets date and time until which the organization are throttled
     *
     * @return void
     * @throws GuzzleException
     */
    final public function resetOrganizationThrottling(): void
    {
        $uri = 'auth-modules/throttled-logins/org-status';

        $this->client->delete($this->buildUrl($uri));
    }
}
