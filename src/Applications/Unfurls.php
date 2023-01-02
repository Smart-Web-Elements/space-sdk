<?php

namespace Swe\SpaceSDK\Applications;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Applications\Unfurls\Domains;
use Swe\SpaceSDK\Applications\Unfurls\Patterns;
use Swe\SpaceSDK\Applications\Unfurls\Queue;

/**
 * Class Unfurls
 * Generated at 2023-01-02 09:05
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Unfurls extends AbstractApi
{
    /**
     * @return Domains
     */
    final public function domains(): Domains
    {
        return new Domains($this->client);
    }

    /**
     * @return Patterns
     */
    final public function patterns(): Patterns
    {
        return new Patterns($this->client);
    }

    /**
     * @return Queue
     */
    final public function queue(): Queue
    {
        return new Queue($this->client);
    }
}
