<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class ClientSecret
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ClientSecret extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $application
     * @return void
     * @throws GuzzleException
     */
    final public function regenerateAppSecret(array $application): void
    {
        $uri = 'applications/{application}/client-secret/regenerate';
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param array $application
     * @param array $response
     * @return string
     * @throws GuzzleException
     */
    final public function getClientSecret(array $application): string
    {
        $uri = 'applications/{application}/client-secret';
        $uriArguments = [
            'application' => $application,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}
