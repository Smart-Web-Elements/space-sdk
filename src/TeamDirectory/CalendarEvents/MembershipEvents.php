<?php

namespace Swe\SpaceSDK\TeamDirectory\CalendarEvents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class MembershipEvents
 * Generated at 2024-02-07 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\CalendarEvents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class MembershipEvents extends AbstractApi
{
    /**
     * Get/search membership events. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Profile.Memberships.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2020-10-14. Use endpoints from 'calendars' resource
     */
    final public function getAllMembershipEvents(array $request, array $response = []): array
    {
        $uri = 'team-directory/calendar-events/membership-events';
        $required = [
            'dateFrom' => Type::Date,
            'dateTo' => Type::Date,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
