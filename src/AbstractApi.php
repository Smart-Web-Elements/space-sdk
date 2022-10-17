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

            if (is_array($type)) {
                if (!is_array($fields[$field])) {
                    return false;
                }

                if (!$this->validateRequiredPost($type, $fields[$field])) {
                    return false;
                }
            }

            if (strtolower($type) === 'array' && !is_array($fields[$field])) {
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
        if ($this->validateRequiredPost($required, $data)) {
            return;
        }

        throw MissingArgumentException::throwWithFields($required);
    }

    /**
     * @param array $oneOfThose
     * @param array $request
     * @return string
     * @throws MissingArgumentException
     */
    protected function throwIfMissing(array $oneOfThose, array $request): string
    {
        $value = '';

        foreach ($oneOfThose as $that) {
            if (isset($request[$that])) {
                $value = $that . ':' . $request[$that];
            }
        }

        if (empty($value)) {
            $message = 'Missing either %s!';
            $last = array_pop($oneOfThose);

            if (!empty($oneOfThose)) {
                $values = '"' . implode('", "', $oneOfThose) . '" or "' . $last . '"';
            } else {
                $values = '"' . $last . '"';
            }

            throw new MissingArgumentException(sprintf($message, $values));
        }

        return $value;
    }

    /**
     * @param array $uriArguments
     * @param array $data
     * @return void
     */
    protected function removeUrlArgumentsFromData(array $uriArguments, array &$data): void
    {
        foreach (array_keys($uriArguments) as $key) {
            unset($data[$key]);
        }
    }
}