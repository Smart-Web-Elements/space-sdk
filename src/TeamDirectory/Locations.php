<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Locations\Map;
use Swe\SpaceSDK\Type;

/**
 * Class Locations
 * Generated at 2023-02-18 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Locations extends AbstractApi
{
    /**
     * Create a location
     *
     * Permissions that may be checked: Locations.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createLocation(array $data, array $response = []): array
    {
        $uri = 'team-directory/locations';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Restore one or more archived locations
     *
     * Permissions that may be checked: Locations.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function restoreMultipleLocations(array $data, array $response = []): array
    {
        $uri = 'team-directory/locations/restore';
        $required = [
            'ids' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Restore an archived location
     *
     * Permissions that may be checked: Locations.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function restoreLocation(string $id, array $response = []): array
    {
        $uri = 'team-directory/locations/{id}/restore';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), [], [], $response);
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
    final public function getAllLocations(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/locations';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get a location by ID
     *
     * Permissions that may be checked: Locations.View
     *
     * @param string $id
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getLocation(string $id, array $response = []): ?array
    {
        $uri = 'team-directory/locations/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
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
    final public function updateLocation(string $id, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/locations/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Archive a location
     *
     * Permissions that may be checked: Locations.Edit
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function archiveLocation(string $id, array $response = []): array
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
    final public function map(): Map
    {
        return new Map($this->client);
    }
}
