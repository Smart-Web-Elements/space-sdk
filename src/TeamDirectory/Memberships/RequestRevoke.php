<?php

namespace Swe\SpaceSDK\TeamDirectory\Memberships;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class RequestRevoke
 *
 * @package Swe\SpaceSDK\TeamDirectory\Memberships
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class RequestRevoke extends AbstractApi
{
    /**
     * Request a team membership to end at a given date/time. Will need approval.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $membershipId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function requestMembershipRevocation(string $membershipId, array $data): void
    {
        $uri = 'team-directory/memberships/{membershipId}/request-revoke';
        $required = [
            'till' => self::TYPE_DATETIME,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'membershipId' => $membershipId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}