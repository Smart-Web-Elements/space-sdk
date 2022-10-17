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
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function deleteEmoji(array $data): void
    {
        $uri = 'emojis/delete';
        $required = [
            'emoji' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

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
     * @param array $data
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function checkIfEmojiExists(array $data): bool
    {
        $uri = 'emojis/exists';
        $required = [
            'emoji' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return (bool)$this->client->get($this->buildUrl($uri), [], $data)[0];
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
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function searchEmoji(array $data, array $response): array
    {
        $uri = 'emojis/search';
        $required = [
            'query' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->get($this->buildUrl($uri), $response, $data);
    }
}