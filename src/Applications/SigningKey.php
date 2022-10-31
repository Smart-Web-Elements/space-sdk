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
final class SigningKey extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $application
     * @return void
     * @throws GuzzleException
     */
    final public function regenerateSigningKey(array $application): void
    {
        $uri = 'applications/{application}/signing-key/regenerate';
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
     * @return string|null
     * @throws GuzzleException
     */
    final public function getSigningKey(array $application): ?string
    {
        $uri = 'applications/{application}/signing-key';
        $uriArguments = [
            'application' => $application,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}
