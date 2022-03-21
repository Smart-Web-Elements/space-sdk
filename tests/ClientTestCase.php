<?php

namespace Swe\SpaceSDK\Tests;


use Dotenv\Dotenv;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use Swe\SpaceSDK\HttpClient;

/**
 * Class ClientTestCase
 *
 * @package Space
 * @author Luca Braun <l.braun@s-w-e.com>
 */
abstract class ClientTestCase extends TestCase
{
    /**
     * @var HttpClient
     */
    protected static HttpClient $client;

    /**
     * @throws GuzzleException
     */
    public static function setUpBeforeClass(): void
    {
        $dotEnv = Dotenv::createImmutable(dirname(__DIR__));
        $dotEnv->load();

        $clientId = $_ENV['CLIENT_ID'];
        $clientSecret = $_ENV['CLIENT_SECRET'];
        $url = $_ENV['URL'];

        static::$client = new HttpClient($url, $clientId, $clientSecret);
    }
}