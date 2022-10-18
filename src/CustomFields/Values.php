<?php

namespace Swe\SpaceSDK\CustomFields;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Values
 *
 * @package Swe\SpaceSDK\CustomFields
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Values extends AbstractApi
{
    /**
     * @param string $entity
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function setValuesForEntity(string $entity, array $data): void
    {
        $uri = 'custom-fields-v2/values/{entity}';
        $required = [
            'customFieldValues' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entity' => $entity,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $entity
     * @param string $customField
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function setSingleValue(string $entity, string $customField, array $data): void
    {
        $uri = 'custom-fields-v2/values/{entity}/{customField}';
        $required = [
            'newValue' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'entity' => $entity,
            'customField' => $customField,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $entity
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllValuesForEntity(string $entity, array $response = []): array
    {
        $uri = 'custom-fields-v2/values/{entity}';
        $uriArguments = [
            'entity' => $entity,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @param string $entity
     * @param string $customField
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getSingleValue(string $entity, string $customField, array $response = []): array
    {
        $uri = 'custom-fields-v2/values/{entity}/{customField}';
        $uriArguments = [
            'entity' => $entity,
            'customField' => $customField,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }
}