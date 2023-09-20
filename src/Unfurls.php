<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Unfurls
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Unfurls extends AbstractApi
{
    /**
     * Block link unfurling
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function blockUnfurl(array $data): void
    {
        $uri = 'unfurls/block-unfurl';
        $required = [
            'link' => Type::String,
            'wholeHost' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Block link unfurling for organization
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function blockUnfurlGlobal(array $data): void
    {
        $uri = 'unfurls/block-unfurl-global';
        $required = [
            'link' => Type::String,
            'wholeHost' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * @param array $data
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function checkBlocked(array $data): bool
    {
        $uri = 'unfurls/check-blocked';
        $required = [
            'link' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return (bool)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * Unblock link unfurling
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function unblockUnfurl(array $data): void
    {
        $uri = 'unfurls/unblock-unfurl';
        $required = [
            'link' => Type::String,
            'wholeHost' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Unblock link unfurling for organization
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function unblockUnfurlGlobal(array $data): void
    {
        $uri = 'unfurls/unblock-unfurl-global';
        $required = [
            'link' => Type::String,
            'wholeHost' => Type::Boolean,
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
    final public function listBlocked(array $request = [], array $response = []): array
    {
        $uri = 'unfurls/list-blocked';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
