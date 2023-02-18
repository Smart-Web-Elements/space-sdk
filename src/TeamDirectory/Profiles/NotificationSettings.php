<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class NotificationSettings
 * Generated at 2023-02-18 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class NotificationSettings extends AbstractApi
{
    /**
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getSpaceGlobalNotificationSettingsForAProfile(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/notification-settings';
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
    final public function setSpaceGlobalNotificationSettingsForAProfile(string $profile, array $data = []): void
    {
        $uri = 'team-directory/profiles/{profile}/notification-settings';
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
