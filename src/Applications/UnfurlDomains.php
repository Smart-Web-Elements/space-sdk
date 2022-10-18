<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class UnfurlDomains
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class UnfurlDomains extends AbstractApi
{
    /**
     * Authorize domains for unfurling by the application.
     *
     * Permissions that may be checked: Unfurl.App.Authorize
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function authorizeUnfurledDomains(string $application, array $data): void
    {
        $uri = 'applications/{application}/unfurl-domains/authorize';
        $required = [
            'domains' => self::TYPE_ARRAY,
            'approve' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * List domains for unfurling by the application.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllUnfurlDomains(string $application, array $response = []): array
    {
        $uri = 'applications/{application}/unfurl-domains';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }
}