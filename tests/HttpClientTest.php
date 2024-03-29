<?php

namespace Swe\SpaceSDK\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use Swe\SpaceSDK\HttpClient;

/**
 * Class HttpClientTest
 *
 * @package Swe\SpaceSDK\Tests
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class HttpClientTest extends TestCase
{
    /**
     * @return HttpClient
     */
    public function testCanConnect(): HttpClient
    {
        if (file_exists(dirname(__DIR__) . '/.env')) {
            $dotenv = Dotenv::createImmutable(dirname(__DIR__));
            $dotenv->load();
        }

        $clientId = $_ENV['CLIENT_ID'];
        $clientSecret = $_ENV['CLIENT_SECRET'];
        $url = $_ENV['URL'];
        $client = new HttpClient($url, $clientId, $clientSecret);

        $this->assertInstanceOf(HttpClient::class, $client);

        return $client;
    }
}