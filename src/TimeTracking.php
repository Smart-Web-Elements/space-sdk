<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\TimeTracking\Items;

/**
 * Class TimeTracking
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class TimeTracking extends AbstractApi
{
    /**
     * @return Items
     */
    public function items(): Items
    {
        return new Items($this->client);
    }
}