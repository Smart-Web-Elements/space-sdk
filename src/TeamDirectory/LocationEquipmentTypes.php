<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class LocationEquipmentTypes
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class LocationEquipmentTypes extends AbstractApi
{
    /**
     * Get all equipment types.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllLocationEquipmentTypes(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/location-equipment-types';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Archive/restore location equipment type. Setting delete to true will archive the equipment type, false will
     * restore it.
     *
     * @param string $name
     * @param bool $delete
     * @return void
     * @throws GuzzleException
     */
    public function deleteLocationEquipmentTypeByName(string $name, bool $delete): void
    {
        $uri = 'team-directory/location-equipment-types/name:{name}';
        $request = [
            'delete' => $delete,
        ];
        $uriArguments = [
            'name' => $name,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}