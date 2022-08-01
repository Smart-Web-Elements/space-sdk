<?php

namespace Swe\SpaceSDK\Exception;


use Exception;

/**
 * Class MissingArgumentException
 *
 * @package Swe\SpaceSDK\Exception
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class MissingArgumentException extends Exception
{
    const MESSAGE = 'You have to fill all required fields: %s';

    /**
     * @param array $fields
     * @return MissingArgumentException
     */
    public static function throwWithFields(array $fields): MissingArgumentException
    {
        return new self(sprintf(self::MESSAGE, json_encode($fields)));
    }
}