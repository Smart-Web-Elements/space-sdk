<?php

namespace Swe\SpaceSDK\CustomFields;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\CustomFields\Fields\EnumValues;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Fields
 *
 * @package Swe\SpaceSDK\CustomFields
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Fields extends AbstractApi
{
    /**
     * @param string $entityType
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createCustomField(string $entityType, array $data, array $response = []): array
    {
        $uri = 'custom-fields-v2/{entityType}/fields';
        $required = [
            'name' => self::TYPE_STRING,
            'type' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entityType' => $entityType,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Re-order custom fields. Pass identifiers of the custom fields in the order you wish the custom fields to be.
     *
     * @param string $entityType
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function reorderCustomFields(string $entityType, array $data): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/reorder';
        $required = [
            'customFields' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entityType' => $entityType,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $entityType
     * @param string $customField
     * @return void
     * @throws GuzzleException
     */
    public function archiveCustomField(string $entityType, string $customField): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/archive';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @param string $entityType
     * @param string $customField
     * @return void
     * @throws GuzzleException
     */
    public function restoreCustomField(string $entityType, string $customField): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/restore';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Get all configured custom fields for an entity type.
     *
     * @param string $entityType
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getCustomFields(string $entityType, array $request = [], array $response = []): array
    {
        $uri = 'custom-fields-v2/{entityType}/fields';
        $uriArguments = [
            'entityType' => $entityType,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Get configured custom field.
     *
     * @param string $entityType
     * @param string $customField
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getSingleCustomField(string $entityType, string $customField, array $response = []): array
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @param string $entityType
     * @param string $customField
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function updateCustomField(string $entityType, string $customField, array $data = []): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $entityType
     * @param string $customField
     * @return void
     * @throws GuzzleException
     */
    public function deleteCustomField(string $entityType, string $customField): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return EnumValues
     */
    public function enumValues(): EnumValues
    {
        return new EnumValues($this->client);
    }
}