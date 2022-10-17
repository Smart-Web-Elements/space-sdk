<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\Checklists\Items;

/**
 * Class Checklists
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Checklists extends AbstractApi
{
    /**
     * @return Items
     */
    public function items(): Items
    {
        return new Items($this->client);
    }
}