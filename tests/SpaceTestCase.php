<?php

namespace Swe\SpaceSDK\Tests;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Space;

/**
 * Class SpaceTestCase
 *
 * @package Swe\SpaceSDK\Tests
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class SpaceTestCase extends ClientTestCase
{
    /**
     * @var Space
     */
    protected static Space $space;

    /**
     * @var string
     */
    protected static string $prefix = '\\Swe\\SpaceSDK\\';

    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::$space = new Space(static::$client);
    }

    /**
     * @return void
     * @throws GuzzleException
     */
    public function testCheckApiComplete(): void
    {
        $responseConfiguration = [
            'allResources' => [
                'id',
                'endpoints' => [
                    'deprecation',
                    'displayName',
                    'experimental',
                    'functionName',
                ],
                'nestedResources!',
            ],
        ];
        $httpModel = static::$space->httpApiModel()->getHttpApiModel($responseConfiguration);

        foreach ($httpModel['allResources'] as $resource) {
            $this->validateClass($resource);
        }
    }

    /**
     * @param array $resource
     * @return void
     */
    private function validateClass(array $resource): void
    {
        $this->assertArrayHasKey('id', $resource, 'Missing id.');

        if (!isset($resource['id'])) {
            return;
        }

        $namespace = $this->idToNamespace($resource['id']);
        $this->assertArrayHasKey('endpoints', $resource, 'Missing endpoints in ' . $namespace);

        if (!isset($resource['endpoints'])) {
            return;
        }

        $this->assertTrue(class_exists($namespace), 'Missing class "' . $namespace . '"');

        if (!class_exists($namespace)) {
            return;
        }

        /** @var AbstractApi $class */
        $class = new $namespace(static::$client);

        foreach ($resource['endpoints'] as $endpoint) {
            $this->validateEndpoint($endpoint, $class);
        }
    }

    /**
     * @param array $endpoint
     * @param AbstractApi $class
     * @return void
     */
    private function validateEndpoint(array $endpoint, AbstractApi $class): void
    {
        $spaceMethod = $endpoint['functionName'];
        $genMethod = $this->displayNameToMethod($endpoint['displayName']);

        $messageTemplate = 'Missing method "' . $class::class . '::%s"';
        $spaceMethodExists = method_exists($class, $endpoint['functionName']);
        $genMethodExists = method_exists($class, $genMethod);

        $this->assertTrue($spaceMethodExists, sprintf($messageTemplate, $spaceMethod));
        $this->assertTrue($genMethodExists, sprintf($messageTemplate, $genMethod));

        if (!$spaceMethodExists && !$genMethodExists) {
            return;
        }

        $correctMethod = $spaceMethodExists ? $spaceMethod : $genMethod;
        $messageTemplate = 'Method "' . $class::class . '::' . $correctMethod . '" is %s!';

        $this->assertNull($endpoint['deprecation'], sprintf($messageTemplate, 'deprecated'));
        $this->assertNull($endpoint['experimental'], sprintf($messageTemplate, 'experimental'));
    }

    /**
     * @param string $id
     * @return string
     */
    private function idToNamespace(string $id): string
    {
        $parts = explode('_', $id);

        foreach ($parts as $index => $part) {
            $parts[$index] = $this->displayNameToMethod($part);
        }

        return static::$prefix . implode('\\', $parts);
    }

    /**
     * @param string $displayName
     * @return string
     */
    private function displayNameToMethod(string $displayName): string
    {
        $method = str_replace('2', 'two', $displayName);
        $method = str_replace(['-', '/'], ' ', $method);
        $method = ucwords($method);

        return str_replace([' ', '?'], '', $method);
    }
}