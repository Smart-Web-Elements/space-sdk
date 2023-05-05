<?php

namespace Swe\SpaceSDK\TeamDirectory\Memberships;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class RequestRevoke
 * Generated at 2023-05-05 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Memberships
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class RequestRevoke extends AbstractApi
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
    final public function requestMembershipRevocation(string $membershipId, array $data): void
    {
        $uri = 'team-directory/memberships/{membershipId}/request-revoke';
        $required = [
            'till' => Type::DateTime,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'membershipId' => $membershipId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
