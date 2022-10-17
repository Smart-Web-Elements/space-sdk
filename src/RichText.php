<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class RichText
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class RichText extends AbstractApi
{
    /**
     * Parses Space markdown syntax into a tree presentation.
     * @see https://www.jetbrains.com/help/space/markdown-syntax.html
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function parseMarkdown(array $data, array $response): array
    {
        $uri = 'rich-text/parse-markdown';
        $required = [
            'text' => 'string',
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }
}