<?php

namespace Swe\SpaceSDK\Tests;

use PHPUnit\Framework\TestCase;
use Swe\SpaceSDK\HttpClient;

/**
 * Class ClientTestCase
 *
 * @package Swe\SpaceSDK\Tests
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ClientTestCase extends TestCase
{
    protected static HttpClient $client;

    protected static string $instanceName;

    protected static string $permissionMissingError = 'permission-denied';

    public static function setUpBeforeClass(): void
    {
        $clientId = $_ENV['CLIENT_ID'];
        $clientSecret = $_ENV['CLIENT_SECRET'];
        $url = $_ENV['URL'];
        $urlParts = explode('//', $url);
        $domain = array_pop($urlParts);
        $domainParts = explode('.', $domain);
        static::$instanceName = array_shift($domainParts);

        static::$client = new HttpClient($url, $clientId, $clientSecret);
    }

    protected function permissionMismatch()
    {
        $this->markTestIncomplete('Missing permissions to complete this test.');
    }
}