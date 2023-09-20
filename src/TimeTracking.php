<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\TimeTracking\Items;

/**
 * Class TimeTracking
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class TimeTracking extends AbstractApi
{
    /**
     * @return Items
     */
    final public function items(): Items
    {
        return new Items($this->client);
    }
}
