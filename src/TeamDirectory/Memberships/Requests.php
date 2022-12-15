<?php

namespace Swe\SpaceSDK\TeamDirectory\Memberships;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Requests
 * Generated at 2022-12-15 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Memberships
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Requests extends AbstractApi
{
    /**
     * Get/search all membership requests. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllRequests(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/memberships/requests';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Approve/reject a team membership request. Setting approved to true will approve the membership request, false will reject it.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $membershipRequestId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateRequest(string $membershipRequestId, array $data): void
    {
        $uri = 'team-directory/memberships/requests/{membershipRequestId}';
        $required = [
            'approved' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'membershipRequestId' => $membershipRequestId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete a team membership request
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $membershipRequestId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function deleteRequest(string $membershipRequestId, array $response = []): array
    {
        $uri = 'team-directory/memberships/requests/{membershipRequestId}';
        $uriArguments = [
            'membershipRequestId' => $membershipRequestId,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
