<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class SigningKey
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class SigningKey extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    final public function regenerateSigningKey(string $application): void
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
    final public function getSigningKey(string $application): ?string
    {
        $uri = 'applications/{application}/signing-key';
        $uriArguments = [
            'application' => $application,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}
