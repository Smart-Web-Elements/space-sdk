<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\CustomFields\Fields;
use Swe\SpaceSDK\CustomFields\Values;

/**
 * Class CustomFields
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class CustomFields extends AbstractApi
{
    /**
     * @return Fields
     */
    public function fields(): Fields
    {
        return new Fields($this->client);
    }

    /**
     * @return Values
     */
    public function values(): Values
    {
        return new Values($this->client);
    }
}