<?php

namespace Swe\SpaceSDK\Applications\Webhooks;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class CustomHeaders
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\Applications\Webhooks
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class CustomHeaders extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $webhookId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function postCustomHeader(string $application, string $webhookId, array $data): void
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/custom-headers';
        $required = [
            'headers' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param string $application
     * @param string $webhookId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getCustomHeader(string $application, string $webhookId, array $response = []): array
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/custom-headers';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
