<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class AbstractApi
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
abstract class AbstractApi
{
    /** @var self|null */
    protected static ?self $instance = null;

    /** @var HttpClient */
    protected HttpClient $client;

    /**
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;

        if (static::$instance) {
            return static::$instance;
        }

        static::$instance = $this;

        return static::$instance;
    }

    /**
     * @param array<string, Type|array<string, Type>> $required
     * @param array $fields
     * @return bool
     */
    protected function validateRequiredPost(array $required, array $fields): bool
    {
        foreach ($required as $field => $type) {
            if (!isset($fields[$field])) {
                return false;
            }

            $value = $fields[$field];

            if (is_array($type)) {
                if (!is_array($value) || !$this->validateRequiredPost($type, $value)) {
                    return false;
                }

                continue;
            }

            $valid = match($type) {
                Type::Date => is_string($value) && preg_match(Regex::Date->value, $value) === 1,
                Type::DateTime => is_string($value) && preg_match(Regex::DateTime->value, $value) === 1,
                Type::Boolean => is_bool($value),
                Type::Array => is_array($value),
                Type::Integer => is_int($value),
                Type::String => is_string($value),
                default => false,
            };

            if (!$valid) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $uri
     * @param array $arguments
     * @return string
     */
    protected function buildUrl(string $uri, array $arguments = []): string
    {
        foreach ($arguments as $pattern => $value) {
            $uri = str_replace('{'.$pattern.'}', $value, $uri);
        }

        return $uri;
    }

    /**
     * @param array $required
     * @param array $data
     * @throws MissingArgumentException
     */
    protected function throwIfInvalid(array $required, array $data): void
    {
        if (!$this->validateRequiredPost($required, $data)) {
            throw MissingArgumentException::throwWithFields($required);
        }
    }
}
