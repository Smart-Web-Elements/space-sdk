<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class VerificationToken
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class VerificationToken extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    public function regenerateVerificationToken(string $application): void
    {
        $uri = 'applications/{application}/verification-token/regenerate';
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
    public function getVerificationToken(string $application): ?string
    {
        $uri = 'applications/{application}/verification-token';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}