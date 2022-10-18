<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class SigningKey
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class SigningKey extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    public function regenerateSigningKey(string $application): void
    {
        $uri = 'applications/{application}/signing-key/regenerate';
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param string $application
     * @return string|null
     * @throws GuzzleException
     */
    public function getSigningKey(string $application): ?string
    {
        $uri = 'applications/{application}/signing-key';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}