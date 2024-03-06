<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class SshKeys
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class SshKeys extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addSshKey(string $application, array $data): void
    {
        $uri = 'applications/{application}/ssh-keys';
        $required = [
            'publicKey' => Type::String,
            'comment' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getSshKeys(string $application, array $response = []): array
    {
        $uri = 'applications/{application}/ssh-keys';
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
     * @return void
     * @throws GuzzleException
     */
    final public function deleteSshKey(string $application, string $fingerprint): void
    {
        $uri = 'applications/{application}/ssh-keys/{fingerprint}';
        $uriArguments = [
            'application' => $application,
            'fingerprint' => $fingerprint,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
