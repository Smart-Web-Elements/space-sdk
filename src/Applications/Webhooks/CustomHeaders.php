<?php

namespace Swe\SpaceSDK\Applications\Webhooks;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class CustomHeaders
 *
 * @package Swe\SpaceSDK\Applications\Webhooks
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class CustomHeaders extends AbstractApi
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
    public function postCustomHeader(string $application, string $webhookId, array $data): void
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/custom-headers';
        $required = [
            'headers' => self::TYPE_ARRAY,
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
    public function getCustomHeader(string $application, string $webhookId, array $response = []): array
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/custom-headers';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }
}