<?php

namespace Swe\SpaceSDK\CustomFields\Fields;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class EnumValues
 *
 * @package Swe\SpaceSDK\CustomFields\Fields
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class EnumValues extends AbstractApi
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
    public function createEnumValue(string $entityType, string $customField, array $data, array $response = []): array
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/enum-values';
        $required = [
            'enumValueToAdd' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * @param string $entityType
     * @param string $customField
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function bulkUpdateEnumValues(string $entityType, string $customField, array $data): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/enum-values/bulk-update';
        $required = [
            'enumValueModifications' => self::TYPE_ARRAY,
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
    public function getEnumValues(
        string $entityType,
        string $customField,
        array $request = [],
        array $response = []
    ): array {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/enum-values';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * @param string $entityType
     * @param string $customField
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateEnumValue(string $entityType, string $customField, array $data): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/enum-values';
        $required = [
            'enumValueToUpdate' => self::TYPE_STRING,
            'newName' => self::TYPE_STRING,
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
    public function deleteEnumValue(string $entityType, string $customField, string $enumValueToRemove): void
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