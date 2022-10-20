<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Status
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Status extends AbstractApi
{
    /**
     * Get two-factor authentication status for a given profile ID. The response indicates whether two-factor
     * authentication is active, not active, or not set up yet.
     *
     * Permissions that may be checked: Profile.View
     *
     * @param string $profile
     * @return string
     * @throws GuzzleException
     */
    public function twoFactorAuthenticationStatus(string $profile): string
    {
        $uri = 'team-directory/profiles/{profile}/2-fa/status';
        $uriArguments = [
            'profile' => $profile,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}