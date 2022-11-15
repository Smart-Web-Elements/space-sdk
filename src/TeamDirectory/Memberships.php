<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Memberships\ManagerCandidates;
use Swe\SpaceSDK\TeamDirectory\Memberships\RequestRevoke;
use Swe\SpaceSDK\TeamDirectory\Memberships\Requests;
use Swe\SpaceSDK\Type;

/**
 * Class Memberships
 * Generated at 2022-11-15 07:46
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Memberships extends AbstractApi
{
    /**
     * Create a team membership
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createMembership(array $data, array $response = []): array
    {
        $uri = 'team-directory/memberships';
        $required = [
            'member' => Type::String,
            'teamId' => Type::String,
            'roleId' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Get/search team memberships. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Profile.Memberships.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllMemberships(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/memberships';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get a single membership by its identifier
     *
     * Permissions that may be checked: Profile.Memberships.View
     *
     * @param string $membershipId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getMembership(string $membershipId, array $response = []): array
    {
        $uri = 'team-directory/memberships/{membershipId}';
        $uriArguments = [
            'membershipId' => $membershipId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update a team membership. Optional parameters will be ignored when null and updated otherwise.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $membershipId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateMembership(string $membershipId, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/memberships/{membershipId}';
        $uriArguments = [
            'membershipId' => $membershipId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Archive/unarchive a team membership. Setting delete to true will archive the membership, false will restore it.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $membershipId
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    final public function deleteMembership(string $membershipId, array $request = []): void
    {
        $uri = 'team-directory/memberships/{membershipId}';
        $uriArguments = [
            'membershipId' => $membershipId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }

    /**
     * Revoke a team membership to end at a given date/time
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $membershipId
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    final public function revokeMembership(string $membershipId, array $request = []): void
    {
        $uri = 'team-directory/memberships/{membershipId}/revoke';
        $uriArguments = [
            'membershipId' => $membershipId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }

    /**
     * @return ManagerCandidates
     */
    final public function managerCandidates(): ManagerCandidates
    {
        return new ManagerCandidates($this->client);
    }

    /**
     * @return Requests
     */
    final public function requests(): Requests
    {
        return new Requests($this->client);
    }

    /**
     * @return RequestRevoke
     */
    final public function requestRevoke(): RequestRevoke
    {
        return new RequestRevoke($this->client);
    }
}
