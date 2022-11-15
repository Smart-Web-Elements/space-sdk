<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class VerificationToken
 * Generated at 2022-11-15 07:46
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class VerificationToken extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    final public function regenerateVerificationToken(string $application): void
    {
        $uri = 'applications/{application}/verification-token/regenerate';
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param string $application
     * @param array $response
     * @return string|null
     * @throws GuzzleException
     */
    final public function getVerificationToken(string $application): ?string
    {
        $uri = 'applications/{application}/verification-token';
        $uriArguments = [
            'application' => $application,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}
