<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Applications\Webhooks\CustomHeaders;
use Swe\SpaceSDK\Applications\Webhooks\SigningKey;
use Swe\SpaceSDK\Applications\Webhooks\Subscriptions;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Webhooks
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Webhooks extends AbstractApi
{
    /**
     * Create application webhook.
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
    public function createWebhook(string $application, array $data, array $response = []): array
    {
        $uri = 'applications/{application}/webhooks';
        $required = [
            'name' => self::TYPE_STRING,
            'acceptedHttpResponseCodes' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Restore archived application webhook.
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $webhookId
     * @return void
     * @throws GuzzleException
     */
    public function postWebhook(string $application, string $webhookId): void
    {
        $uri = 'applications/{application}/webhooks/{webhookId}';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Get application webhooks.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllWebhooks(string $application, array $request = [], array $response = []): array
    {
        $uri = 'applications/{application}/webhooks';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param string $application
     * @param string $webhookId
     * @return string|null
     * @throws GuzzleException
     */
    public function bearerToken(string $application, string $webhookId): ?string
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/bearer-token';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }

    /**
     * Update application webhook.
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $webhookId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function updateWebhook(string $application, string $webhookId, array $data = []): void
    {
        $uri = 'applications/{application}/webhooks/{webhookId}';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Archive application webhook.
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $webhookId
     * @return void
     * @throws GuzzleException
     */
    public function deleteWebhook(string $application, string $webhookId): void
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
    public function customHeaders(): CustomHeaders
    {
        return new CustomHeaders($this->client);
    }

    /**
     * @return SigningKey
     */
    public function signingKey(): SigningKey
    {
        return new SigningKey($this->client);
    }

    /**
     * @return Subscriptions
     */
    public function subscriptions(): Subscriptions
    {
        return new Subscriptions($this->client);
    }
}