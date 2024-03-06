<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Planning\Issues\Fields\Order;
use Swe\SpaceSDK\Projects\Planning\Issues\Fields\Visibility;

/**
 * Class Fields
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Fields extends AbstractApi
{
    /**
     * @return Order
     */
    final public function order(): Order
    {
        return new Order($this->client);
    }

    /**
     * @return Visibility
     */
    final public function visibility(): Visibility
    {
        return new Visibility($this->client);
    }
}
