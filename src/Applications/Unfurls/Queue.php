<?php

namespace Swe\SpaceSDK\Applications\Unfurls;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Queue
 * Generated at 2024-02-28 02:00
 *
 * @package Swe\SpaceSDK\Applications\Unfurls
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Queue extends AbstractApi
{
    /**
     * Provide Space with unfurls content. Method is to be called by the application providing unfurls.
     *
     * Permissions that may be checked: Unfurl.App.ProvideAttachment
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function postUnfurlsContent(array $data, array $response = []): array
    {
        $uri = 'applications/unfurls/queue/content';
        $required = [
            'unfurls' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Request user to authenticate in external system to provide unfurls from it. Method is to be called by the application providing unfurls.
     *
     * Permissions that may be checked: Unfurl.App.ProvideAttachment
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function requestExternalSystemAuthentication(array $data): void
    {
        $uri = 'applications/unfurls/queue/request-external-auth';
        $required = [
            'queueItemId' => Type::String,
            'message' => [
                'style' => Type::String,
                'sections' => Type::Array,
            ],
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Clear all external system authentication requests for the specified user. Method is to be called by the application providing unfurls.
     *
     * Permissions that may be checked: Unfurl.App.ProvideAttachment
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function clearExternalSystemAuthenticationRequests(array $data): void
    {
        $uri = 'applications/unfurls/queue/reset-external-auth-requests';
        $required = [
            'userId' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Get links for unfurling by the application. Method is to be called by the application providing unfurls.
     *
     * Permissions that may be checked: Unfurl.App.ProvideAttachment
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getUnfurlQueueItems(array $request, array $response = []): array
    {
        $uri = 'applications/unfurls/queue';
        $required = [
            'batchSize' => Type::Integer,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
