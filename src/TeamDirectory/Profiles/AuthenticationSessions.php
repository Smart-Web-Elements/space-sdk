<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class AuthenticationSessions
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class AuthenticationSessions extends AbstractApi
{
    /**
     * Get the current authentication sessions for a given profile ID
     *
     * Permissions that may be checked: Profile.AuthenticationSessions.Edit
     *
     * @param string $owner
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllAuthenticationSessions(string $owner, array $response = []): array
    {
        $uri = 'team-directory/profiles/authentication-sessions/{owner}';
        $uriArguments = [
            'owner' => $owner,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Terminate an existing authentication session. Doing so will close the session and log out.
     *
     * Permissions that may be checked: Profile.AuthenticationSessions.Edit
     *
     * @param string $owner
     * @param string $sessionId
     * @return void
     * @throws GuzzleException
     */
    final public function terminateOwnAuthenticationSession(string $owner, string $sessionId): void
    {
        $uri = 'team-directory/profiles/authentication-sessions/{owner}/{sessionId}';
        $uriArguments = [
            'owner' => $owner,
            'sessionId' => $sessionId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
