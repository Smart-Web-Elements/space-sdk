<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Leads
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Leads extends AbstractApi
{
    /**
     * Get team leads for a given profile ID
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2020-12-01. To be removed
     */
    final public function getAllLeads(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/leads';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
