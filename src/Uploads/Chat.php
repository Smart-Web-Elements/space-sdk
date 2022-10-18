<?php

namespace Swe\SpaceSDK\Uploads;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Uploads\Chat\PublicUrl;

/**
 * Class Chat
 *
 * @package Swe\SpaceSDK\Uploads
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Chat extends AbstractApi
{
    /**
     * @return PublicUrl
     */
    public function publicUrl(): PublicUrl
    {
        return new PublicUrl($this->client);
    }
}