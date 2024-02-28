<?php

namespace Swe\SpaceSDK\Chats\Messages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Chats\Messages\SyncBatch\CurrentEtag;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class SyncBatch
 * Generated at 2024-02-28 02:00
 *
 * @package Swe\SpaceSDK\Chats\Messages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class SyncBatch extends AbstractApi
{
    /**
     * Get messages in specified channel for synchronization with third-party system. Messages with etag greater than specified value are returned, in the order of creation and updates. Use etag value "0" to start retrieving all messages in the channel. To get the current etag value, use "Get current sync batch etag" method. Read more in the [documentation](https://www.jetbrains.com/help/space/sync-api.html).
     *
     * Permissions that may be checked: Channel.ViewMessages
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getSyncBatch(array $request, array $response = []): array
    {
        $uri = 'chats/messages/sync-batch';
        $required = [
            'batchInfo' => Type::String,
            'channel' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * @return CurrentEtag
     */
    final public function currentEtag(): CurrentEtag
    {
        return new CurrentEtag($this->client);
    }
}
