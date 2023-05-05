<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Timezone
 * Generated at 2023-05-05 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Timezone extends AbstractApi
{
    /**
     * Get profile timezone. Returns profile's working hours timezone, location timezone or device timezone, whichever is present first in this list.
     *
     * Permissions that may be checked: Profile.View
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getTimezone(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/timezone';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
