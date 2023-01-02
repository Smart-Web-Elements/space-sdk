<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class TrustedCertificates
 * Generated at 2023-01-02 09:05
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class TrustedCertificates extends AbstractApi
{
    /**
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createTrustedCertificate(array $data, array $response = []): array
    {
        $uri = 'trusted-certificates';
        $required = [
            'alias' => Type::String,
            'data' => Type::String,
            'archived' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllTrustedCertificates(array $response = []): array
    {
        $uri = 'trusted-certificates';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getCertificateInfo(array $request, array $response = []): array
    {
        $uri = 'trusted-certificates/info';
        $required = [
            'data' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateTrustedCertificate(string $id, array $data = []): void
    {
        $uri = 'trusted-certificates/{id}';
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
    final public function deleteTrustedCertificate(string $id): void
    {
        $uri = 'trusted-certificates/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
