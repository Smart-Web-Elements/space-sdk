<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Applications\Parameters\Profile;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Parameters
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Parameters extends AbstractApi
{
    /**
     * Return all application parameters. Only accessible with an app token, not a user token.
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllParameters(array $response = []): array
    {
        $uri = 'applications/parameters';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Get application parameter by key. Only accessible with an app token, not a user token.
     *
     * @param string $key
     * @return string
     * @throws GuzzleException
     */
    final public function getParameter(string $key): string
    {
        $uri = 'applications/parameters/{key}';
        $uriArguments = [
            'key' => $key,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }

    /**
     * Set application parameter by key. Only accessible with an app token, not a user token. There is a limit of 100 app parameters per app. The key cannot be longer than 64 characters. The value cannot be longer than 1000 characters.
     *
     * @param string $key
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setParameter(string $key, array $data): void
    {
        $uri = 'applications/parameters/{key}';
        $required = [
            'value' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'key' => $key,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove application parameter by key. Only accessible with an app token, not a user token.
     *
     * @param string $key
     * @return void
     * @throws GuzzleException
     */
    final public function removeParameter(string $key): void
    {
        $uri = 'applications/parameters/{key}';
        $uriArguments = [
            'key' => $key,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Profile
     */
    final public function profile(): Profile
    {
        return new Profile($this->client);
    }
}
