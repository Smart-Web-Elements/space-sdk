<?php

namespace Swe\SpaceSDK\CustomFields;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\CustomFields\Fields\EnumValues;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Fields
 *
 * @package Swe\SpaceSDK\CustomFields
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Fields extends AbstractApi
{
    /**
     * @param array $entityType
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createCustomField(array $entityType, array $data, array $response = []): array
    {
        $uri = 'custom-fields-v2/{entityType}/fields';
        $required = [
            'name' => Type::String,
            'type' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entityType' => $entityType,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Re-order custom fields. Pass identifiers of the custom fields in the order you wish the custom fields to be.
     *
     * @param array $entityType
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function reorderCustomFields(array $entityType, array $data): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/reorder';
        $required = [
            'customFields' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entityType' => $entityType,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param array $entityType
     * @param array $customField
     * @return void
     * @throws GuzzleException
     */
    final public function archiveCustomField(array $entityType, array $customField): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/archive';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * @param array $entityType
     * @param array $customField
     * @return void
     * @throws GuzzleException
     */
    final public function restoreCustomField(array $entityType, array $customField): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}/restore';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Get all configured custom fields for an entity type
     *
     * @param array $entityType
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getCustomFields(array $entityType, array $request = [], array $response = []): array
    {
        $uri = 'custom-fields-v2/{entityType}/fields';
        $uriArguments = [
            'entityType' => $entityType,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Get configured custom field
     *
     * @param array $entityType
     * @param array $customField
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getSingleCustomField(array $entityType, array $customField, array $response = []): array
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param array $entityType
     * @param array $customField
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateCustomField(array $entityType, array $customField, array $data = []): void
    {
        $uri = 'custom-fields-v2/{entityType}/fields/{customField}';
        $uriArguments = [
            'entityType' => $entityType,
            'customField' => $customField,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param array $entityType
     * @param array $customField
     * @return void
     * @throws GuzzleException
     */
    final public function deleteCustomField(array $entityType, array $customField): void
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
    final public function enumValues(): EnumValues
    {
        return new EnumValues($this->client);
    }
}
