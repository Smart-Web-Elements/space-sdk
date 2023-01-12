<?php

namespace Swe\SpaceSDK\Applications\Webhooks;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Subscriptions
 * Generated at 2023-01-12 02:00
 *
 * @package Swe\SpaceSDK\Applications\Webhooks
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Subscriptions extends AbstractApi
{
    /**
     * Add webhook subscription
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $webhookId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createSubscription(
        string $application,
        string $webhookId,
        array $data,
        array $response = [],
    ): array {
        $uri = 'applications/{application}/webhooks/{webhookId}/subscriptions';
        $required = [
            'name' => Type::String,
            'subscription' => [
                'subjectCode' => Type::String,
                'filters' => Type::Array,
                'eventTypeCodes' => Type::Array,
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Ensures that all permissions required for this subscription are requested in the corresponding permission role
     *
     * @param string $application
     * @param string $webhookId
     * @param string $subscriptionId
     * @return void
     * @throws GuzzleException
     */
    final public function requestMissingRights(string $application, string $webhookId, string $subscriptionId): void
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/subscriptions/{subscriptionId}/request-missing-rights';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
            'subscriptionId' => $subscriptionId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Get webhook subscriptions
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param string $webhookId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllSubscriptions(string $application, string $webhookId, array $response = []): array
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/subscriptions';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update webhook subscription
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $webhookId
     * @param string $subscriptionId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateSubscription(
        string $application,
        string $webhookId,
        string $subscriptionId,
        array $data = [],
        array $response = [],
    ): array {
        $uri = 'applications/{application}/webhooks/{webhookId}/subscriptions/{subscriptionId}';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
            'subscriptionId' => $subscriptionId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Delete webhook subscription
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param string $webhookId
     * @param string $subscriptionId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteSubscription(string $application, string $webhookId, string $subscriptionId): void
    {
        $uri = 'applications/{application}/webhooks/{webhookId}/subscriptions/{subscriptionId}';
        $uriArguments = [
            'application' => $application,
            'webhookId' => $webhookId,
            'subscriptionId' => $subscriptionId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
