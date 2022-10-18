<?php

namespace Swe\SpaceSDK\AuthModules;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\AuthModules\ThrottledLogins\OrgStatus;

/**
 * Class ThrottledLogins
 *
 * @package Swe\SpaceSDK\AuthModules
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ThrottledLogins extends AbstractApi
{
    /**
     * Returns logins that are currently subjected to rate limits when logging in to Space.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getThrottledLogins(array $request = [], array $response = []): array
    {
        $uri = 'auth-modules/throttled-logins';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Resets the counter that tracks failed login attempts for the account with the specified logins. The member who
     * use these accounts are no longer blocked from attempting to log in to Space.
     *
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    public function resetThrottlingStatus(array $request): void
    {
        $uri = 'auth-modules/throttled-logins';

        $this->client->delete($this->buildUrl($uri), $request);
    }

    /**
     * @return OrgStatus
     */
    public function orgStatus(): OrgStatus
    {
        return new OrgStatus($this->client);
    }
}