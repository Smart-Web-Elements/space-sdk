<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class ExternalLinkPatterns
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ExternalLinkPatterns extends AbstractApi
{
    /**
     * Add a prefix to be expanded to external links.
     * Read more: https://www.jetbrains.com/help/space/external-links.html
     *
     * Permissions that may be checked: Unfurl.ExternalLinkPatterns.Manage
     *
     * @param array $data
     * @return void
     * @throws Exception\MissingArgumentException
     * @throws GuzzleException
     */
    public function createExternalLinkPattern(array $data): void
    {
        $uri = 'external-link-patterns';
        $required = [
            'pattern' => 'string',
            'linkReplacement' => 'string',
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * List all prefixes to be automatically expanded to external links.
     * Read more: https://www.jetbrains.com/help/space/external-links.html
     *
     * Permissions that may be checked: Unfurl.ExternalLinkPatterns.View
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllExternalLinkPatterns(array $response): array
    {
        $uri = 'external-link-patterns';

        return $this->client->get($this->buildUrl($uri), $response);
    }

    /**
     * Delete prefix for expanding to external links.
     * Read more: https://www.jetbrains.com/help/space/external-links.html
     *
     * Permissions that may be checked: Unfurl.ExternalLinkPatterns.Manage
     *
     * @param array $data
     * @return void
     * @throws Exception\MissingArgumentException
     * @throws GuzzleException
     */
    public function deleteExternalLinkPattern(array $data): void
    {
        $uri = 'external-link-patterns';
        $required = [
            'pattern' => 'string',
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->delete($this->buildUrl($uri), $data);
    }
}