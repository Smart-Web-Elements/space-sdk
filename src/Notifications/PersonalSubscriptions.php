<?php

namespace Swe\SpaceSDK\Notifications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class PersonalSubscriptions
 *
 * @package Swe\SpaceSDK\Notifications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class PersonalSubscriptions extends AbstractApi
{
    /**
     * Update personal subscription settings for a member.
     *
     * Permissions that may be checked: Profile.NotificationSettings.View
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updatePersonalSubscriptionSubject(array $data): void
    {
        $uri = 'notifications/personal-subscriptions/update-personal-subscription-subject';
        $required = [
            'profile' => self::TYPE_STRING,
            'subjectCode' => self::TYPE_STRING,
            'feed' => self::TYPE_STRING,
            'enabled' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Update personal subscription settings for a member.
     *
     * Permissions that may be checked: Profile.NotificationSettings.View
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updatePersonalSubscriptionTarget(array $data): void
    {
        $uri = 'notifications/personal-subscriptions/update-personal-subscription-target';
        $required = [
            'profile' => self::TYPE_STRING,
            'targetCode' => self::TYPE_STRING,
            'feed' => self::TYPE_STRING,
            'eventCodes' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * List all personal subscription targets.
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function allPersonalSubscriptionTargets(array $response = []): array
    {
        $uri = 'notifications/personal-subscriptions/all-personal-subscription-targets';

        return $this->client->get($this->buildUrl($uri), $response);
    }

    /**
     * Get personal subscription settings for a member.
     *
     * Permissions that may be checked: Profile.NotificationSettings.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getPersonalSubscriptionSettings(array $request, array $response = []): array
    {
        $uri = 'notifications/personal-subscriptions/personal-subscription-settings';
        $required = [
            'profile' => self::TYPE_STRING,
            'feed' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response);
    }
}