<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class GpgKeys
 * Generated at 2023-10-24 02:15
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class GpgKeys extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addGpgKey(string $application, array $data, array $response = []): array
    {
        $uri = 'applications/{application}/gpg-keys';
        $required = [
            'publicKey' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getGpgKeys(string $application, array $response = []): array
    {
        $uri = 'applications/{application}/gpg-keys';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $fingerprint
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function revokeGpgKey(string $application, string $fingerprint, array $data = []): void
    {
        $uri = 'applications/{application}/gpg-keys/{fingerprint}';
        $uriArguments = [
            'application' => $application,
            'fingerprint' => $fingerprint,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $fingerprint
     * @return void
     * @throws GuzzleException
     */
    final public function deleteGpgKey(string $application, string $fingerprint): void
    {
        $uri = 'applications/{application}/gpg-keys/{fingerprint}';
        $uriArguments = [
            'application' => $application,
            'fingerprint' => $fingerprint,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
