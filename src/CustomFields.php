<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\CustomFields\Fields;
use Swe\SpaceSDK\CustomFields\Values;

/**
 * Class CustomFields
 * Generated at 2023-07-13 02:15
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class CustomFields extends AbstractApi
{
    /**
     * @return Values
     */
    final public function values(): Values
    {
        return new Values($this->client);
    }

    /**
     * @return Fields
     */
    final public function fields(): Fields
    {
        return new Fields($this->client);
    }
}
