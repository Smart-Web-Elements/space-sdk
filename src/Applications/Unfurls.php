<?php

namespace Swe\SpaceSDK\Applications;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Applications\Unfurls\Domains;
use Swe\SpaceSDK\Applications\Unfurls\Patterns;
use Swe\SpaceSDK\Applications\Unfurls\Queue;

/**
 * Class Unfurls
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Unfurls extends AbstractApi
{
    /**
     * @return Domains
     */
    public function domains(): Domains
    {
        return new Domains($this->client);
    }

    /**
     * @return Patterns
     */
    public function patterns(): Patterns
    {
        return new Patterns($this->client);
    }

    /**
     * @return Queue
     */
    public function queue(): Queue
    {
        return new Queue($this->client);
    }
}