<?php

namespace Swe\SpaceSDK\AuthModules;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\AuthModules\ThrottledLogins\OrgStatus;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class ThrottledLogins
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\AuthModules
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ThrottledLogins extends AbstractApi
{
    /**
     * Returns logins that are currently subjected to rate limits when logging in to Space
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getThrottledLogins(array $request = [], array $response = []): array
    {
        $uri = 'auth-modules/throttled-logins';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Resets the counter that tracks failed login attempts for the account with the specified logins. The member who use these accounts are no longer blocked from attempting to log in to Space.
     *
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function resetThrottlingStatus(array $request): void
    {
        $uri = 'auth-modules/throttled-logins';
        $required = [
            'logins' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);

        $this->client->delete($this->buildUrl($uri), $request);
    }

    /**
     * @return OrgStatus
     */
    final public function orgStatus(): OrgStatus
    {
        return new OrgStatus($this->client);
    }
}
