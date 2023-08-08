<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Emojis
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Emojis extends AbstractApi
{
    /**
     * Add custom emoji
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addEmoji(array $data): void
    {
        $uri = 'emojis/add';
        $required = [
            'emoji' => Type::String,
            'attachmentId' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Delete an emoji by name
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function deleteEmoji(array $data): void
    {
        $uri = 'emojis/delete';
        $required = [
            'emoji' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Record emojis usage and update frequently used list
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function recordEmojisUsage(array $data): void
    {
        $uri = 'emojis/record-usage';
        $required = [
            'emojis' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Check whether a given emoji name exists
     *
     * @param array $request
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function checkIfEmojiExists(array $request): bool
    {
        $uri = 'emojis/exists';
        $required = [
            'emoji' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return (bool)$this->client->get($this->buildUrl($uri), $request)[0];
    }

    /**
     * List frequently used emojis
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFrequentlyUsedEmojis(array $response = []): array
    {
        $uri = 'emojis/frequently-used';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Search for emoji
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function searchEmoji(array $request, array $response = []): array
    {
        $uri = 'emojis/search';
        $required = [
            'query' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get custom emojis for synchronization with third-party system. Custom emojis with etag greater than specified value are returned. Read more in the [documentation](https://www.jetbrains.com/help/space/sync-api.html).
     *
     * Permissions that may be checked: Emojis.ViewEmojiList
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getSyncBatch(array $request, array $response = []): array
    {
        $uri = 'emojis/sync-batch';
        $required = [
            'batchInfo' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
