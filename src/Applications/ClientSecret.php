<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class ClientSecret
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ClientSecret extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    final public function regenerateAppSecret(string $application): void
    {
        $uri = 'applications/{application}/client-secret/regenerate';
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param string $application
     * @return string
     * @throws GuzzleException
     */
    final public function getClientSecret(string $application): string
    {
        $uri = 'applications/{application}/client-secret';
        $uriArguments = [
            'application' => $application,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}
