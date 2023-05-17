<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class UnfurlPatterns
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class UnfurlPatterns extends AbstractApi
{
    /**
     * Authorize patterns for unfurling by the application
     *
     * Permissions that may be checked: Unfurl.App.Authorize
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function authorizeUnfurledPatterns(string $application, array $data): void
    {
        $uri = 'applications/{application}/unfurl-patterns/authorize';
        $required = [
            'patterns' => Type::Array,
            'approve' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * List patterns for unfurling by the application
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllUnfurlPatterns(string $application, array $response = []): array
    {
        $uri = 'applications/{application}/unfurl-patterns';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
