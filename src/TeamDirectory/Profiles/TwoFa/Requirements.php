<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Requirements
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Requirements extends AbstractApi
{
    /**
     * Get two-factor authentication requirements for a given profile ID. The response indicates whether two-factor authentication is required by participation in some permission roles.
     *
     * Permissions that may be checked: Profile.View
     *
     * @param array $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function twoFactorAuthenticationRequirements(array $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/2-fa/requirements';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
