<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Applications\Webhooks\CustomHeaders;
use Swe\SpaceSDK\Applications\Webhooks\SigningKey;
use Swe\SpaceSDK\Applications\Webhooks\Subscriptions;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Webhooks
 * Generated at 2023-11-10 04:08
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Webhooks extends AbstractApi
{
    /**
     * Create application webhook
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createWebhook(string $application, array $data, array $response = []): array
    {
        $uri = 'applications/{application}/webhooks';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Restore archived application webhook
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $webhookId
     * @return void
     * @throws GuzzleException
     */
    final public function postWebhook(string $application, string $webhookId): void
    {
        $uri = 'applications/{application}/webhooks/{webhookId}';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Get application webhooks
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllWebhooks(string $application, array $request = [], array $response = []): array
    {
        $uri = 'applications/{application}/webhooks';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param string $application
     * @param string $webhookId
     * @return string|null
     * @throws GuzzleException
     */
    final public function bearerToken(string $application, string $webhookId): ?string
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/bearer-token';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }

    /**
     * Update application webhook
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $webhookId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateWebhook(string $application, string $webhookId, array $data = []): void
    {
        $uri = 'applications/{application}/webhooks/{webhookId}';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Archive application webhook
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $webhookId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteWebhook(string $application, string $webhookId): void
    {
        $uri = 'applications/{application}/webhooks/{webhookId}';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return CustomHeaders
     */
    final public function customHeaders(): CustomHeaders
    {
        return new CustomHeaders($this->client);
    }

    /**
     * @return SigningKey
     */
    final public function signingKey(): SigningKey
    {
        return new SigningKey($this->client);
    }

    /**
     * @return Subscriptions
     */
    final public function subscriptions(): Subscriptions
    {
        return new Subscriptions($this->client);
    }
}
