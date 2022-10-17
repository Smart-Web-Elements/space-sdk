<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class TrustedCertificates
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class TrustedCertificates extends AbstractApi
{
    /**
     * @param array $data
     * @param array $response
     * @return array
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function createTrustedCertificate(array $data, array $response = []): array
    {
        $uri = 'trusted-certificates';
        $required = [
            'alias' => self::TYPE_STRING,
            'data' => self::TYPE_STRING,
            'archived' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllTrustedCertificates(array $response = []): array
    {
        $uri = 'trusted-certificates';

        return $this->client->get($this->buildUrl($uri), $response);
    }

    /**
     * @param string $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getCertificateInfo(string $data, array $response = []): array
    {
        $uri = 'trusted-certificate/info';
        $request = [
            'data' => $data,
        ];

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function updateTrustedCertificate(string $id, array $data = []): void
    {
        $uri = 'trusted-certificate/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteTrustedCertificate(string $id): void
    {
        $uri = 'trusted-certificate/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}