<?php


namespace Swe\SpaceSDK\Tests;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Space;

/**
 * Class SpaceTestCase
 *
 * @package Swe\SpaceSDK\Tests
 * @author Luca Braun <l.braun@s-w-e.com>
 */
abstract class SpaceTestCase extends ClientTestCase
{
    /**
     * @var Space
     */
    protected static Space $space;

    /**
     * @throws GuzzleException
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::$space = new Space(static::$client);
    }
}