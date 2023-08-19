<?php

namespace Swe\SpaceSDK\Notifications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class PersonalSubscriptions
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\Notifications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class PersonalSubscriptions extends AbstractApi
{
    /**
     * Update personal subscription settings for a member
     *
     * Permissions that may be checked: Profile.NotificationSettings.View
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updatePersonalSubscriptionSubject(array $data): void
    {
        $uri = 'notifications/personal-subscriptions/update-personal-subscription-subject';
        $required = [
            'profile' => Type::String,
            'subjectCode' => Type::String,
            'feed' => Type::String,
            'enabled' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Update personal subscription settings for a member
     *
     * Permissions that may be checked: Profile.NotificationSettings.View
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updatePersonalSubscriptionTarget(array $data): void
    {
        $uri = 'notifications/personal-subscriptions/update-personal-subscription-target';
        $required = [
            'profile' => Type::String,
            'targetCode' => Type::String,
            'feed' => Type::String,
            'eventCodes' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * List all personal subscription targets
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function allPersonalSubscriptionTargets(array $response = []): array
    {
        $uri = 'notifications/personal-subscriptions/all-personal-subscription-targets';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Get personal subscription settings for a member
     *
     * Permissions that may be checked: Profile.NotificationSettings.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getPersonalSubscriptionSettings(array $request, array $response = []): array
    {
        $uri = 'notifications/personal-subscriptions/personal-subscription-settings';
        $required = [
            'profile' => Type::String,
            'feed' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
