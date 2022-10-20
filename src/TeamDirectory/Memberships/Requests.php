<?php

namespace Swe\SpaceSDK\TeamDirectory\Memberships;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Requests
 *
 * @package Swe\SpaceSDK\TeamDirectory\Memberships
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Requests extends AbstractApi
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
    public function getAllRequests(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/memberships/requests';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Approve/reject a team membership request. Setting approved to true will approve the membership request, false
     * will reject it.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $membershipRequestId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateRequest(string $membershipRequestId, array $data): void
    {
        $uri = 'team-directory/memberships/requests/{membershipRequestId}';
        $required = [
            'approved' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'membershipRequestId' => $membershipRequestId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete a team membership request.
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $membershipRequestId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function deleteRequest(string $membershipRequestId, array $response = []): array
    {
        $uri = 'team-directory/memberships/requests/{membershipRequestId}';
        $uriArguments = [
            'membershipRequestId' => $membershipRequestId,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), [], $response);
    }
}