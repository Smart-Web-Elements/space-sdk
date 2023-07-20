<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class LocationMapMemberPoints
 * Generated at 2023-07-20 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class LocationMapMemberPoints extends AbstractApi
{
    /**
     * Mark member location on a map
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createLocationMapMemberPoint(array $data, array $response = []): array
    {
        $uri = 'team-directory/location-map-member-points';
        $required = [
            'memberLocationId' => Type::String,
            'x' => Type::Integer,
            'y' => Type::Integer,
            'mapId' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Get members on a map for a location ID
     *
     * Permissions that may be checked: Profile.Locations.Map.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllLocationMapMemberPoints(array $request, array $response = []): array
    {
        $uri = 'team-directory/location-map-member-points';
        $required = [
            'locationId' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Update member location on a map
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $locationPointId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateLocationMapMemberPoint(
        string $locationPointId,
        array $data = [],
        array $response = [],
    ): array {
        $uri = 'team-directory/location-map-member-points/{locationPointId}';
        $uriArguments = [
            'locationPointId' => $locationPointId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Delete member location from a map
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $locationPointId
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function deleteLocationMapMemberPoint(string $locationPointId, array $request): void
    {
        $uri = 'team-directory/location-map-member-points/{locationPointId}';
        $required = [
            'delete' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'locationPointId' => $locationPointId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
