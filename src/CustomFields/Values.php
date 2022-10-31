<?php

namespace Swe\SpaceSDK\CustomFields;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Values
 *
 * @package Swe\SpaceSDK\CustomFields
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Values extends AbstractApi
{
    /**
     * @param array $entity
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setValuesForEntity(array $entity, array $data): void
    {
        $uri = 'custom-fields-v2/values/{entity}';
        $required = [
            'customFieldValues' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entity' => $entity,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param array $entity
     * @param array $customField
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setSingleValue(array $entity, array $customField, array $data): void
    {
        $uri = 'custom-fields-v2/values/{entity}/{customField}';
        $required = [
            'newValue' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entity' => $entity,
            'customField' => $customField,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param array $entity
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllValuesForEntity(array $entity, array $response = []): array
    {
        $uri = 'custom-fields-v2/values/{entity}';
        $uriArguments = [
            'entity' => $entity,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param array $entity
     * @param array $customField
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getSingleValue(array $entity, array $customField, array $response = []): array
    {
        $uri = 'custom-fields-v2/values/{entity}/{customField}';
        $uriArguments = [
            'entity' => $entity,
            'customField' => $customField,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
