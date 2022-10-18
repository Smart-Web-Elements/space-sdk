<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\PublicHolidays\Calendars;
use Swe\SpaceSDK\PublicHolidays\Holidays;

/**
 * Class PublicHolidays
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class PublicHolidays extends AbstractApi
{
    /**
     * @return Calendars
     */
    public function calendars(): Calendars
    {
        return new Calendars($this->client);
    }

    /**
     * @return Holidays
     */
    public function holidays(): Holidays
    {
        return new Holidays($this->client);
    }
}