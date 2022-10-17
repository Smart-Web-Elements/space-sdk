<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Emojis
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Emojis extends AbstractApi
{
    /**
     * Add custom emoji.
     *
     * @param array $data
     * @return void
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function addEmoji(array $data): void
    {
        $uri = 'emojis/add';
        $required = [
            'emoji' => self::TYPE_STRING,
            'attachmentId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Delete an emoji by name.
     *
     * @param string $emoji
     * @return void
     * @throws GuzzleException
     */
    public function deleteEmoji(string $emoji): void
    {
        $uri = 'emojis/delete';
        $data = [
            'emoji' => $emoji,
        ];

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Record emojis usage and update frequently used list.
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function recordEmojisUsage(array $data): void
    {
        $uri = 'emojis/record-usage';
        $required = [
            'emojis' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Check whether a given emoji name exists.
     *
     * @param string $emoji
     * @return bool
     * @throws GuzzleException
     */
    public function checkIfEmojiExists(string $emoji): bool
    {
        $uri = 'emojis/exists';
        $request = [
            'emoji' => $emoji,
        ];

        return (bool)$this->client->get($this->buildUrl($uri), [], $request)[0];
    }

    /**
     * List frequently used emojis.
     *
     * @return array
     * @throws GuzzleException
     */
    public function getFrequentlyUsedEmojis(): array
    {
        $uri = 'emojis/frequently-used';

        return $this->client->get($this->buildUrl($uri));
    }

    /**
     * Search for emojis.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function searchEmoji(array $request, array $response = []): array
    {
        $uri = 'emojis/search';
        $required = [
            'query' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}