<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Memberships\ManagerCandidates;
use Swe\SpaceSDK\TeamDirectory\Memberships\RequestRevoke;
use Swe\SpaceSDK\TeamDirectory\Memberships\Requests;

/**
 * Class Memberships
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Memberships extends AbstractApi
{
    /**
     * Create a team membership.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createMembership(array $data, array $response = []): array
    {
        $uri = 'team-directory/memberships';
        $required = [
            'member' => self::TYPE_STRING,
            'teamId' => self::TYPE_STRING,
            'roleId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
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
    public function getAllMemberships(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/memberships';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Get a single membership by its identifier.
     *
     * Permissions that may be checked: Profile.Memberships.View
     *
     * @param string $membershipId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getMembership(string $membershipId, array $response = []): array
    {
        $uri = 'directory/memberships/{membershipId}';
        $uriArguments = [
            'membershipId' => $membershipId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
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
    public function updateMembership(string $membershipId, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/memberships/{membershipId}';
        $uriArguments = [
            'membershipId' => $membershipId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
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
    public function deleteMembership(string $membershipId, array $request = []): void
    {
        $uri = 'team-directory/memberships/{membershipId}';
        $uriArguments = [
            'membershipId' => $membershipId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }

    /**
     * Revoke a team membership to end at a given date/time.
     *
     * Permissions that may be checked: Team.Edit
     *
     * @param string $membershipId
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    public function revokeMembership(string $membershipId, array $request = []): void
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
    public function managerCandidates(): ManagerCandidates
    {
        return new ManagerCandidates($this->client);
    }

    /**
     * @return RequestRevoke
     */
    public function requestRevoke(): RequestRevoke
    {
        return new RequestRevoke($this->client);
    }

    /**
     * @return Requests
     */
    public function requests(): Requests
    {
        return new Requests($this->client);
    }
}