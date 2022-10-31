<?php

namespace Swe\SpaceSDK;

/**
 * Class Regex
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
enum Regex: string
{
    case Date = '/\d{4}-\d{2}-\d{2}/';
    case DateTime = '/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}.\d{3}Z/';
}
