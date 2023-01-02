<?php

namespace Swe\SpaceSDK\Uploads;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Image
 * Generated at 2023-01-02 09:05
 *
 * @package Swe\SpaceSDK\Uploads
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Image extends AbstractApi
{
    /**
     * Get meta information for a previously uploaded image
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getImageAttachmentMetadata(string $id, array $response = []): array
    {
        $uri = 'uploads/image/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
