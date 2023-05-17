<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class RichText
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class RichText extends AbstractApi
{
    /**
     * Parses [Space markdown syntax](https://www.jetbrains.com/help/space/markdown-syntax.html) into a tree presentation
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function parseMarkdown(array $data, array $response = []): array
    {
        $uri = 'rich-text/parse-markdown';
        $required = [
            'text' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }
}
