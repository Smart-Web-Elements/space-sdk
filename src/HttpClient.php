<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class HttpClient
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class HttpClient
{
    /** @var string */
    private readonly string $url;

    /** @var string */
    private readonly string $clientId;

    /** @var string */
    private readonly string $clientSecret;

    /** @var string */
    private readonly string $tokenType;

    /** @var string */
    private string $token = '';

    /**
     * HttpClient constructor.
     *
     * @param string $url
     * @param string $clientId
     * @param string $clientSecret
     * @throws GuzzleException
     */
    public function __construct(string $url, string $clientId, string $clientSecret)
    {
        $this->url = rtrim($url, '/');
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->fetchToken();
    }

    /**
     * Perform a get request.
     *
     * @param string $uri
     * @param array $responseFields
     * @param array $requestFields
     * @return array
     * @throws GuzzleException
     */
    public function get(string $uri, array $requestFields = [], array $responseFields = []): array
    {
        $response = $this->getClient()->get($this->getUri($uri, $requestFields, $responseFields));
        $jsonResponse = json_decode($response->getBody()->getContents(), true);

        return is_array($jsonResponse) ? $jsonResponse : [$jsonResponse];
    }

    /**
     * Perform a post request.
     *
     * @param string $uri
     * @param array $data
     * @param array $responseFields
     * @param array $requestFields
     * @return array
     * @throws GuzzleException
     */
    public function post(string $uri, array $data = [], array $requestFields = [], array $responseFields = []): array
    {
        $response = $this->getClient()->post($this->getUri($uri, $requestFields, $responseFields), ['json' => $data]);
        $jsonResponse = json_decode($response->getBody()->getContents(), true);

        return is_array($jsonResponse) ? $jsonResponse : [$jsonResponse];
    }

    /**
     * Perform a put request.
     *
     * @param string $uri
     * @param array $data
     * @param array $responseFields
     * @param array $requestFields
     * @return array
     * @throws GuzzleException
     */
    public function put(string $uri, array $data = [], array $requestFields = [], array $responseFields = []): array
    {
        $response = $this->getClient()->put($this->getUri($uri, $requestFields, $responseFields), ['json' => $data]);
        $jsonResponse = json_decode($response->getBody()->getContents(), true);

        return is_array($jsonResponse) ? $jsonResponse : [$jsonResponse];
    }

    /**
     * Perform a patch request.
     *
     * @param string $uri
     * @param array $data
     * @param array $responseFields
     * @param array $requestFields
     * @return array
     * @throws GuzzleException
     */
    public function patch(string $uri, array $data = [], array $requestFields = [], array $responseFields = []): array
    {
        $response = $this->getClient()->patch($this->getUri($uri, $requestFields, $responseFields), ['json' => $data]);
        $jsonResponse = json_decode($response->getBody()->getContents(), true);

        return is_array($jsonResponse) ? $jsonResponse : [$jsonResponse];
    }

    /**
     * Perform a delete request.
     *
     * @param string $uri
     * @param array $responseFields
     * @param array $requestFields
     * @return array
     * @throws GuzzleException
     */
    public function delete(string $uri, array $requestFields = [], array $responseFields = []): array
    {
        $response = $this->getClient()->delete($this->getUri($uri, $requestFields, $responseFields));
        $jsonResponse = json_decode($response->getBody()->getContents(), true);

        return is_array($jsonResponse) ? $jsonResponse : [$jsonResponse];
    }

    /**
     * Get the full built uri with request fields and response fields.
     *
     * @param string $uri
     * @param array $responseFields
     * @param array $requestFields
     * @return string
     */
    private function getUri(string $uri, array $requestFields = [], array $responseFields = []): string
    {
        if (!str_starts_with($uri, '/')) {
            $uri = '/api/http/' . $uri;
        }

        $additional = [
            $this->parseRequestFields($requestFields),
            $this->parseResponseFields($responseFields),
        ];

        $additional = array_filter($additional);

        if (empty($additional)) {
            return $uri;
        }

        return $uri . '?' . implode('&', $additional);
    }

    /**
     * Parse an array of request fields for the uri.
     *
     * @param array $fields
     * @return string
     */
    private function parseRequestFields(array $fields = []): string
    {
        $string = [];

        foreach ($fields as $field => $value) {
            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }

            $string[] = $field . '=' . $value;
        }

        return implode('&', $string);
    }

    /**
     * Parse an array of response fields for the uri.
     *
     * @param array $fields
     * @param bool $first
     * @return string
     */
    private function parseResponseFields(array $fields = [], bool $first = true): string
    {
        $result = [];

        foreach ($fields as $field => $value) {
            if (is_array($value)) {
                $result[] = $field . '(' . $this->parseResponseFields($value, false) . ')';
                continue;
            }

            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }

            $result[] = $value;
        }

        if (empty($result)) {
            return '';
        }

        $result = implode(',', $result);

        return $first ? '$fields=' . $result : $result;
    }

    /**
     * Get the client instance.
     *
     * @param bool $withAuth
     * @param array $options
     * @return Client
     */
    private function getClient(bool $withAuth = true, array $options = []): Client
    {
        if (!isset($options['base_uri'])) {
            $options['base_uri'] = $this->url;
        }

        if (!isset($options['headers'])) {
            $options['headers'] = [];
        }

        $options['headers']['Accept'] = 'application/json';

        if ($withAuth && !isset($options['headers']['Authorization'])) {
            $options['headers']['Authorization'] = $this->tokenType . ' ' . $this->token;
        }

        return new Client($options);
    }

    /**
     * Try to fetch the oauth token for requests.
     *
     * @throws GuzzleException
     */
    private function fetchToken(): void
    {
        $options = [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
        ];
        $parameters = [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'scope' => '**',
            ],
        ];
        $client = $this->getClient(false, $options);
        $response = $client->post('/oauth/token', $parameters);
        $array = json_decode($response->getBody()->getContents(), true);

        $this->tokenType = $array['token_type'];
        $this->token = $array['access_token'];
    }
}
