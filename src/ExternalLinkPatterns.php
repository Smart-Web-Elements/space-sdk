<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class ExternalLinkPatterns
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ExternalLinkPatterns extends AbstractApi
{
    /**
     * Add a prefix to be expanded to external links
     *
     * Permissions that may be checked: Unfurl.ExternalLinkPatterns.Manage
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createExternalLinkPattern(array $data): void
    {
        $uri = 'external-link-patterns';
        $required = [
            'pattern' => Type::String,
            'linkReplacement' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * List all prefixes to be automatically expanded to external links
     *
     * Permissions that may be checked: Unfurl.ExternalLinkPatterns.View
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllExternalLinkPatterns(array $response = []): array
    {
        $uri = 'external-link-patterns';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Delete prefix for expanding to external links
     *
     * Permissions that may be checked: Unfurl.ExternalLinkPatterns.Manage
     *
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function deleteExternalLinkPattern(array $request): void
    {
        $uri = 'external-link-patterns';
        $required = [
            'pattern' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        $this->client->delete($this->buildUrl($uri), $request);
    }
}
