<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class UnfurlDomains
 * Generated at 2023-01-27 02:00
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class UnfurlDomains extends AbstractApi
{
    /**
     * Authorize domains for unfurling by the application
     *
     * Permissions that may be checked: Unfurl.App.Authorize
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function authorizeUnfurledDomains(string $application, array $data): void
    {
        $uri = 'applications/{application}/unfurl-domains/authorize';
        $required = [
            'domains' => Type::Array,
            'approve' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * List domains for unfurling by the application
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllUnfurlDomains(string $application, array $response = []): array
    {
        $uri = 'applications/{application}/unfurl-domains';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
