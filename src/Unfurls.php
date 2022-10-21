<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Unfurls
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Unfurls extends AbstractApi
{
    /**
     * Block link unfurling.
     *
     * @param array $data
     * @return void
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function blockUnfurl(array $data): void
    {
        $uri = 'unfurls/block-unfurl';
        $required = [
            'link' => self::TYPE_STRING,
            'wholeHost' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Block link unfurling for organization.
     *
     * @param array $data
     * @return void
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function blockUnfurlGlobal(array $data): void
    {
        $uri = 'unfurls/block-unfurl-global';
        $required = [
            'link' => self::TYPE_STRING,
            'wholeHost' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * @param string $link
     * @return bool
     * @throws GuzzleException
     */
    public function checkBlocked(string $link): bool
    {
        $uri = 'unfurls/check-blocked';
        $data = [
            'link' => $link,
        ];

        return (bool)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * Block link unfurling.
     *
     * @param array $data
     * @return void
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function unblockUnfurl(array $data): void
    {
        $uri = 'unfurls/unblock-unfurl';
        $required = [
            'link' => self::TYPE_STRING,
            'wholeHost' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Block link unfurling for organization.
     *
     * @param array $data
     * @return void
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function unblockUnfurlGlobal(array $data): void
    {
        $uri = 'unfurls/unblock-unfurl-global';
        $required = [
            'link' => self::TYPE_STRING,
            'wholeHost' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function listBlocked(array $request = [], array $response = []): array
    {
        $uri = 'unfurls/list-blocked';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}