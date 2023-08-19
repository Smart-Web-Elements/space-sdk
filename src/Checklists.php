<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\Checklists\Items;

/**
 * Class Checklists
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Checklists extends AbstractApi
{
    /**
     * @return Items
     */
    final public function items(): Items
    {
        return new Items($this->client);
    }
}
