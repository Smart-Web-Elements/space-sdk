<?php

namespace Swe\SpaceSDK;


use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class AbstractApi
 *
 * @package Space
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
     * @param array $request
     * @return string
     * @throws MissingArgumentException
     */
    protected function throwIfKeyIdMissing(array $request): string
    {
        $value = '';

        if (isset($request['id'])) {
            $value = 'id:'.$request['id'];
        }

        if (isset($request['key'])) {
            $value = 'key:'.$request['key'];
        }

        if (empty($value)) {
            throw new MissingArgumentException('Missing either "id" or "key"!');
        }

        return $value;
    }

    /**
     * @param array $request
     * @return string
     * @throws MissingArgumentException
     */
    protected function throwIfIdMissing(array $request): string
    {
        $value = '';

        if (isset($request['id'])) {
            $value = $request['id'];
        }

        if (empty($value)) {
            throw new MissingArgumentException('Missing "id"!');
        }

        return $value;
    }
}