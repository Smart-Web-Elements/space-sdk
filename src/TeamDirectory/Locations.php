<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Locations\Map;

/**
 * Class Locations
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Locations extends AbstractApi
{
    /**
     * Create a location.
     *
     * Permissions that may be checked: Locations.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createLocation(array $data, array $response = []): array
    {
        $uri = 'team-directory/locations';
        $required = [
            'name' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Restore one or more archived locations.
     *
     * Permissions that may be checked: Locations.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function restoreMultipleLocations(array $data, array $response = []): array
    {
        $uri = 'team-directory/locations/restore';
        $required = [
            'ids' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Restore an archived location.
     *
     * Permissions that may be checked: Locations.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function restoreLocation(string $id, array $response = []): array
    {
        $uri = 'team-directory/locations/{id}/restore';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Get/search all locations. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Locations.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllLocations(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/locations';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Get a location by ID.
     *
     * Permissions that may be checked: Locations.View
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getLocation(string $id, array $response = []): array
    {
        $uri = 'eam-directory/locations/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Update a location. Optional parameters will be ignored when null and updated otherwise.
     *
     * Permissions that may be checked: Locations.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updateLocation(string $id, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/locations/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Archive a location.
     *
     * Permissions that may be checked: Locations.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function archiveLocation(string $id, array $response = []): array
    {
        $uri = 'team-directory/locations/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @return Map
     */
    public function map(): Map
    {
        return new Map($this->client);
    }
}