<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\PublicHolidays\Calendars;
use Swe\SpaceSDK\PublicHolidays\Holidays;

/**
 * Class PublicHolidays
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class PublicHolidays extends AbstractApi
{
    /**
     * @return Calendars
     */
    final public function calendars(): Calendars
    {
        return new Calendars($this->client);
    }

    /**
     * @return Holidays
     */
    final public function holidays(): Holidays
    {
        return new Holidays($this->client);
    }
}
