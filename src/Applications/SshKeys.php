<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class SshKeys
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class SshKeys extends AbstractApi
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
    public function addSSHKey(string $application, array $data): void
    {
        $uri = 'applications/{application}/ssh-keys';
        $required = [
            'publicKey' => self::TYPE_STRING,
            'comment' => self::TYPE_STRING,
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
    public function getSSHKeys(string $application, array $response = []): array
    {
        $uri = 'applications/{application}/ssh-keys';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $fingerprint
     * @return void
     * @throws GuzzleException
     */
    public function deleteSSHKey(string $application, string $fingerprint): void
    {
        $uri = 'applications/{application}/ssh-keys/{fingerprint}';
        $uriArguments = [
            'application' => $application,
            'fingerprint' => $fingerprint,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}