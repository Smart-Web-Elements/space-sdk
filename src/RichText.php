<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class RichText
 * Generated at 2024-02-28 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class RichText extends AbstractApi
{
    /**
     * Parses [Space markdown syntax](https://www.jetbrains.com/help/space/markdown-syntax.html) into a tree presentation.
     * Warning: we are currently refining the hierarchy of the RtDocument, and it is likely to undergo changes in the near future. This hierarchy will be utilized in various subsystems such as documents, chats, and issues.
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
