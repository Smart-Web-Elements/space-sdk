<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\TimeTracking\Items;

/**
 * Class TimeTracking
 * Generated at 2022-12-15 11:10
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
