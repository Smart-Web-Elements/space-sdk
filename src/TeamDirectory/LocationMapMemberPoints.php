<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class LocationMapMemberPoints
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class LocationMapMemberPoints extends AbstractApi
{
    /**
     * Mark member location on a map.
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createLocationMapMemberPoint(array $data, array $response = []): array
    {
        $uri = 'team-directory/location-map-member-points';
        $required = [
            'memberLocationId' => self::TYPE_STRING,
            'x' => self::TYPE_INTEGER,
            'y' => self::TYPE_INTEGER,
            'mapId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Get members on a map for a location ID.
     *
     * Permissions that may be checked: Profile.Locations.Map.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllLocationMapMemberPoints(array $request, array $response = []): array
    {
        $uri = 'team-directory/location-map-member-points';
        $required = [
            'locationId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Update member location on a map.
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $locationPointId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updateLocationMapMemberPoint(string $locationPointId, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/location-map-member-points/{locationPointId}';
        $uriArguments = [
            'locationPointId' => $locationPointId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Delete member location from a map.
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $locationPointId
     * @param bool $delete
     * @return void
     * @throws GuzzleException
     */
    public function deleteLocationMapMemberPoint(string $locationPointId, bool $delete): void
    {
        $uri = 'team-directory/location-map-member-points/{locationPointId}';
        $uriArguments = [
            'locationPointId' => $locationPointId,
        ];
        $request = [
            'delete' => $delete,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}