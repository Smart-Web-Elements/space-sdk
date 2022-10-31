<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class NotificationSettings
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class NotificationSettings extends AbstractApi
{
    /**
     * @param array $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getSpaceGlobalNotificationSettingsForAProfile(array $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/notification-settings';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param array $profile
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function setSpaceGlobalNotificationSettingsForAProfile(array $profile, array $data = []): void
    {
        $uri = 'team-directory/profiles/{profile}/notification-settings';
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
