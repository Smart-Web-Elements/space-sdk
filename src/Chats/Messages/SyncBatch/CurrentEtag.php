<?php

namespace Swe\SpaceSDK\Chats\Messages\SyncBatch;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class CurrentEtag
 * Generated at 2023-07-13 02:15
 *
 * @package Swe\SpaceSDK\Chats\Messages\SyncBatch
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class CurrentEtag extends AbstractApi
{
    /**
     * Get current sync etag for given channel. You can use the returned etag to retrieve updates starting from this point through "Get sync batch" method. To retrieve all records instead, use "0" as the starting etag value. Read more in the [documentation](https://www.jetbrains.com/help/space/sync-api.html).
     *
     * Permissions that may be checked: Channel.ViewChannel
     *
     * @param array $request
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getCurrentSyncEtag(array $request): string
    {
        $uri = 'chats/messages/sync-batch/current-etag';
        $required = [
            'channel' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return (string)$this->client->get($this->buildUrl($uri), $request)[0];
    }
}
