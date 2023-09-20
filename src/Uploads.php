<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Uploads\Chat;
use Swe\SpaceSDK\Uploads\Image;

/**
 * Class Uploads
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Uploads extends AbstractApi
{
    /**
     * Request a URL that can be used to upload an attachment.
     * An attachment can be uploaded to the URL that is returned, by making a PUT request that has a proper content-type header and the attachment data as the request body. The PUT request returns a string that is an id of the uploaded attachment. The attachment id can be passed to other API methods where this attachment needs to be used. Attachments are available for download at `/d/{attachmentId}`.
     * The 'storagePrefix' parameter can be one of file, maps, emoji or attachments.
     * The 'mediaType' parameter can be omitted for all uploads. For image uploads that need to be resized automatically for specific use, such as chat stickers or emoji, use one of `chat-image-attachment`, `chat-sticker`, `emoji`.
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createUpload(array $data): string
    {
        $uri = 'uploads';
        $required = [
            'storagePrefix' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * @return Chat
     */
    final public function chat(): Chat
    {
        return new Chat($this->client);
    }

    /**
     * @return Image
     */
    final public function image(): Image
    {
        return new Image($this->client);
    }
}
