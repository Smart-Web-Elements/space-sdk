<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class MemberLocations
 * Generated at 2022-11-15 07:46
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class MemberLocations extends AbstractApi
{
    /**
     * Add a member location, optionally from/until a given date
     *
     * Permissions that may be checked: Profile.Locations.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createMemberLocation(array $data, array $response = []): array
    {
        $uri = 'team-directory/member-locations';
        $required = [
            'member' => Type::String,
            'location' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Get/search member locations. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Profile.Locations.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllMemberLocations(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/member-locations';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get a member location by its ID
     *
     * Permissions that may be checked: Profile.Locations.View
     *
     * @param string $memberLocationId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getMemberLocation(string $memberLocationId, array $response = []): array
    {
        $uri = 'team-directory/member-locations/{memberLocationId}';
        $uriArguments = [
            'memberLocationId' => $memberLocationId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update member location. Optional parameters will be ignored when null and updated otherwise.
     *
     * Permissions that may be checked: Profile.Locations.Edit
     *
     * @param string $memberLocationId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateMemberLocation(string $memberLocationId, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/member-locations/{memberLocationId}';
        $uriArguments = [
            'memberLocationId' => $memberLocationId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Archive/unarchive a member location. Setting delete to true will archive the member location, false will restore it.
     *
     * Permissions that may be checked: Profile.Locations.Edit
     *
     * @param string $memberLocationId
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    final public function deleteMemberLocation(string $memberLocationId, array $request = []): void
    {
        $uri = 'team-directory/member-locations/{memberLocationId}';
        $uriArguments = [
            'memberLocationId' => $memberLocationId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
