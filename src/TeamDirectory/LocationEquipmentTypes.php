<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class LocationEquipmentTypes
 * Generated at 2023-01-02 09:05
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class LocationEquipmentTypes extends AbstractApi
{
    /**
     * Get all equipment types
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllLocationEquipmentTypes(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/location-equipment-types';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Archive/restore location equipment type. Setting delete to true will archive the equipment type, false will restore it.
     *
     * @param string $name
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function deleteLocationEquipmentTypeByName(string $name, array $request): void
    {
        $uri = 'team-directory/location-equipment-types/name:{name}';
        $required = [
            'delete' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'name' => $name,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
