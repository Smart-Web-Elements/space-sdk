<?php

namespace Swe\SpaceSDK\TeamDirectory\Locations;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Map
 * Generated at 2024-02-07 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Locations
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Map extends AbstractApi
{
    /**
     * Get map for a location ID
     *
     * Permissions that may be checked: Locations.View
     *
     * @param string $id
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getMap(string $id, array $response = []): ?array
    {
        $uri = 'team-directory/locations/{id}/map';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update the map for a location
     *
     * Permissions that may be checked: Locations.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateMap(string $id, array $data, array $response = []): array
    {
        $uri = 'team-directory/locations/{id}/map';
        $required = [
            'mapPictureId' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }
}
