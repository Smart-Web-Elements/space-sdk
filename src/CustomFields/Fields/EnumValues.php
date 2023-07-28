<?php

namespace Swe\SpaceSDK\CustomFields\Fields;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class EnumValues
 * Generated at 2023-07-28 02:08
 *
 * @package Swe\SpaceSDK\CustomFields\Fields
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class EnumValues extends AbstractApi
{
    /**
     * @param string $entityType
     * @param string $customField
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createEnumValue(
        string $entityType,
        string $customField,
        array $data,
        array $response = [],
    ): array {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/enum-values';
        $required = [
            'enumValueToAdd' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param string $entityType
     * @param string $customField
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function bulkUpdateEnumValues(string $entityType, string $customField, array $data): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/enum-values/bulk-update';
        $required = [
            'enumValueModifications' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $entityType
     * @param string $customField
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getEnumValues(
        string $entityType,
        string $customField,
        array $request = [],
        array $response = [],
    ): array {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/enum-values';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $entityType
     * @param string $customField
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateEnumValue(string $entityType, string $customField, array $data): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/enum-values';
        $required = [
            'enumValueToUpdate' => Type::String,
            'newName' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $entityType
     * @param string $customField
     * @param string $enumValueToRemove
     * @return void
     * @throws GuzzleException
     */
    final public function deleteEnumValue(string $entityType, string $customField, string $enumValueToRemove): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/enum-values/{enumValueToRemove}';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
            'enumValueToRemove' => $enumValueToRemove,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
