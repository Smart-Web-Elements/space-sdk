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
    public const TYPE_INTEGER = 'integer';
    public const TYPE_STRING = 'string';
    public const TYPE_ARRAY = 'array';
    public const TYPE_BOOLEAN = 'boolean';
    public const TYPE_DATE = 'date';

    public const REGEX_DATE = '/\d{4}-\d{2}-\d{2}/';

    /**
     * @var self|null
     */
    protected static ?self $instance = null;

    /**
     * @var HttpClient
     */
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
     * @param array $required
     * @param array $fields
     * @return bool
     */
    public function validateRequiredPost(array $required, array $fields): bool
    {
        foreach ($required as $field => $type) {
            if (!isset($fields[$field])) {
                return false;
            }

            $value = $fields[$field];

            switch ($type) {
                case self::TYPE_STRING:
                    if (!is_string($value)) {
                        return false;
                    }

                    break;
                case self::TYPE_INTEGER:
                    if (!is_numeric($value)) {
                        return false;
                    }

                    break;
                case self::TYPE_ARRAY:
                    if (!is_array($value)) {
                        return false;
                    }

                    break;
                case self::TYPE_BOOLEAN:
                    if (!is_bool($value)) {
                        return false;
                    }

                    break;
                case self::TYPE_DATE:
                    if (!is_string($value)) {
                        return false;
                    }

                    if (preg_match(self::REGEX_DATE, $value) !== 1) {
                        return false;
                    }

                    break;
            }

            if (is_array($type)) {
                if (!is_array($value)) {
                    return false;
                }

                if (!$this->validateRequiredPost($type, $value)) {
                    return false;
                }
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
        if ($this->validateRequiredPost($required, $data)) {
            return;
        }

        throw MissingArgumentException::throwWithFields($required);
    }
}