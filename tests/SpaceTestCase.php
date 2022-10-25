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
    protected static string $prefix = '\\Swe\\SpaceSDK';

    /**
     * @var string[]
     */
    private static array $exceptionClassNames = [
        'Readonly' => 'ClassReadonly',
    ];

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
            'resources' => [
                'id',
                'displayPlural',
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

        foreach ($httpModel['resources'] as $resource) {
            $this->validateClass($resource);
        }
    }

    /**
     * @param array $resource
     * @param string $parentClass
     * @return void
     */
    private function validateClass(array $resource, string $parentClass = ''): void
    {
        if (empty($parentClass)) {
            $parentClass = static::$prefix;
        }

        $this->assertArrayHasKey('id', $resource, 'Missing id.');
        $this->assertArrayHasKey('displayPlural', $resource, 'Missing display plural.');
        $namespace = $this->displayPluralToNamespace($resource['displayPlural'], $parentClass);
        $this->assertArrayHasKey('endpoints', $resource, 'Missing endpoints in ' . $namespace);

        if ($this->isClassDeprecated($resource) || stripos($resource['displayPlural'], '(deprecated)') !== false) {
            return;
        }

        $this->assertTrue(class_exists($namespace), 'Missing class "' . $namespace . '"');

        /** @var AbstractApi $class */
        $class = new $namespace(static::$client);

        foreach ($resource['endpoints'] as $endpoint) {
            $this->validateEndpoint($endpoint, $class);
        }

        if (!empty($resource['nestedResources'])) {
            foreach ($resource['nestedResources'] as $nestedResource) {
                $this->validateNestedMethods($class, $nestedResource);
                $this->validateClass($nestedResource, $namespace);
            }
        }
    }

    /**
     * @param AbstractApi $parent
     * @param array $nested
     * @return void
     */
    private function validateNestedMethods(AbstractApi $parent, array $nested): void
    {
        if ($this->isClassDeprecated($nested) || stripos($nested['displayPlural'], '(deprecated)') !== false) {
            return;
        }

        $className = $this->displayNameToMethod($nested['displayPlural']);

        if (in_array($className, self::$exceptionClassNames)) {
            $className = array_flip(self::$exceptionClassNames)[$className];
        }

        $method = lcfirst($className);
        $missingTemplate = 'Missing method "' . get_class($parent) . '::%s"';

        $this->assertTrue(method_exists($parent, $method), sprintf($missingTemplate, $method));
    }

    /**
     * @param array $endpoint
     * @param AbstractApi $class
     * @return void
     */
    private function validateEndpoint(array $endpoint, AbstractApi $class): void
    {
        $deprecated = isset($endpoint['deprecation']) && !empty($endpoint['deprecation']);
        $experimental = isset($endpoint['experimental']) && !empty($endpoint['experimental']);

        $method = $endpoint['functionName'];

        $missingTemplate = 'Missing method "' . get_class($class) . '::%s" -> %s';
        $deprecatedTemplate = 'Method "' . get_class($class) . '::%s" is deprecated';
        $experimentalTemplate = 'Method "' . get_class($class) . '::%s" is experimental';
        $methodExists = method_exists($class, $endpoint['functionName']);

        if (!$methodExists) {
            if (!$deprecated && !$experimental) {
                $this->fail(sprintf($missingTemplate, $method, $endpoint['displayName']));
            }

            return;
        }

        if ($deprecated) {
            $this->addWarning(sprintf($deprecatedTemplate, $method));
        }

        if ($experimental) {
            $this->addWarning(sprintf($experimentalTemplate, $method));
        }
    }

    /**
     * @param string $displayPlural
     * @param string $parentClass
     * @return string
     */
    private function displayPluralToNamespace(string $displayPlural, string $parentClass = ''): string
    {
        return $parentClass . '\\' . $this->displayNameToMethod($displayPlural);
    }

    /**
     * @param string $displayName
     * @return string
     */
    private function displayNameToMethod(string $displayName): string
    {
        $method = str_replace('xxx', '', $displayName);
        $method = str_replace('2', 'two', $method);
        $method = str_replace(['-', '/'], ' ', $method);
        $method = ucwords($method);

        if (isset(self::$exceptionClassNames[$method])) {
            $method = self::$exceptionClassNames[$method];
        }

        return str_replace([' ', '?'], '', $method);
    }

    /**
     * @param array $resource
     * @return bool
     */
    private function isClassDeprecated(array $resource): bool
    {
        $endpointsDeprecated = $this->areEndpointsDeprecated($resource['endpoints'] ?? []);
        $nestedDeprecated = [];

        foreach ($resource['nestedResources'] as $nestedResource) {
            $nestedDeprecated[] = $this->isClassDeprecated($nestedResource);
        }

        $nestedDeprecated = array_unique($nestedDeprecated);
        $nestedDeprecated = array_filter($nestedDeprecated);

        if (empty($nestedDeprecated)) {
            return $endpointsDeprecated;
        }

        return $endpointsDeprecated && !in_array(false, $nestedDeprecated);
    }

    /**
     * @param array $endpoints
     * @return bool
     */
    private function areEndpointsDeprecated(array $endpoints): bool
    {
        $endpointLength = count($endpoints);

        if ($endpointLength === 0) {
            return false;
        }

        foreach ($endpoints as $endpoint) {
            if (empty($endpoint['deprecation'])) {
                return false;
            }
        }

        return true;
    }
}