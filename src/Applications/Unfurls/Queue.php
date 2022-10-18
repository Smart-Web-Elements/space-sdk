<?php

namespace Swe\SpaceSDK\Applications\Unfurls;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Queue
 *
 * @package Swe\SpaceSDK\Applications\Unfurls
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Queue extends AbstractApi
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
    public function postUnfurlsContent(array $data, array $response = []): array
    {
        $uri = 'applications/unfurls/queue/content';
        $required = [
            'unfurls' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Request user to authenticate in external system to provide unfurls from it. Method is to be called by the
     * application providing unfurls.
     *
     * Permissions that may be checked: Unfurl.App.ProvideAttachment
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function requestExternalSystemAuthentication(array $data): void
    {
        $uri = 'applications/unfurls/queue/request-external-auth';
        $required = [
            'queueItemId' => self::TYPE_STRING,
            'message' => [
                'style' => self::TYPE_STRING,
                'sections' => self::TYPE_ARRAY,
            ],
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Clear all external system authentication requests for the specified user. Method is to be called by the
     * application providing unfurls.
     *
     * Permissions that may be checked: Unfurl.App.ProvideAttachment
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function clearExternalSystemAuthenticationRequests(array $data): void
    {
        $uri = 'applications/unfurls/queue/reset-external-auth-requests';
        $required = [
            'userId' => self::TYPE_STRING,
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
    public function getUnfurlQueueItems(array $request, array $response = []): array
    {
        $uri = 'applications/unfurls/queue';
        $required = [
            'batchSize' => self::TYPE_INTEGER,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}