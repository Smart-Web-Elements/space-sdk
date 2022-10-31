<?php

namespace Swe\SpaceSDK\Applications\Webhooks;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class SigningKey
 *
 * @package Swe\SpaceSDK\Applications\Webhooks
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class SigningKey extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $application
     * @param string $webhookId
     * @return void
     * @throws GuzzleException
     */
    final public function regenerate(array $application, string $webhookId): void
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/signing-key/regenerate';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param array $application
     * @param string $webhookId
     * @param array $response
     * @return string|null
     * @throws GuzzleException
     */
    final public function getSigningKey(array $application, string $webhookId): ?string
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/signing-key';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}
