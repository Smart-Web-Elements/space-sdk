<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Settings
 * Generated at 2023-03-09 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Settings extends AbstractApi
{
    /**
     * This endpoint will return profile information and Space personalisation data such as projects in the navigation bar, etc.
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getSpacePersonalizationDataForAProfile(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/settings';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $profile
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function setSpacePersonalizationDataForAProfile(string $profile, array $data = []): void
    {
        $uri = 'team-directory/profiles/{profile}/settings';
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
