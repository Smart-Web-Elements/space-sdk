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
class HttpClient
{
    /**
     * @var string
     */
    private string $url;

    /**
     * @var string
     */
    private string $clientId;

    /**
     * @var string
     */
    private string $clientSecret;

    /**
     * @var string
     */
    private string $tokenType;

    /**
     * @var string
     */
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
     * @param string $uri
     * @param array $responseFields
     * @param array $requestFields
     * @return array
     * @throws GuzzleException
     */
    public function get(string $uri, array $responseFields = [], array $requestFields = []): array
    {
        $response = $this->getClient()->get($this->getUri($uri, $responseFields, $requestFields));
        $jsonResponse = json_decode($response->getBody()->getContents(), true);

        return is_array($jsonResponse) ? $jsonResponse : [$jsonResponse];
    }

    /**
     * @param string $uri
     * @return bool
     * @throws GuzzleException
     */
    public function delete(string $uri): bool
    {
        $response = $this->getClient()->delete($this->getUri($uri));

        return $response->getStatusCode() === 200;
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $responseFields
     * @param array $requestFields
     * @return array
     * @throws GuzzleException
     */
    public function post(string $uri, array $data = [], array $responseFields = [], array $requestFields = []): array
    {
        $response = $this->getClient()->post($this->getUri($uri, $responseFields, $requestFields), ['json' => $data]);
        $jsonResponse = json_decode($response->getBody()->getContents(), true);

        return is_array($jsonResponse) ? $jsonResponse : [$jsonResponse];
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $responseFields
     * @param array $requestFields
     * @return array
     * @throws GuzzleException
     */
    public function patch(string $uri, array $data = [], array $responseFields = [], array $requestFields = []): array
    {
        $response = $this->getClient()->patch($this->getUri($uri, $responseFields, $requestFields), ['json' => $data]);
        $jsonResponse = json_decode($response->getBody()->getContents(), true);

        return is_array($jsonResponse) ? $jsonResponse : [$jsonResponse];
    }

    /**
     * @param string $uri
     * @param array $responseFields
     * @param array $requestFields
     * @return string
     */
    protected function getUri(string $uri, array $responseFields = [], array $requestFields = []): string
    {
        if (substr($uri, 0, 1) !== '/') {
            $uri = '/api/http/'.$uri;
        }

        $additional = [
            $this->parseRequestFields($requestFields),
            $this->parseResponseFields($responseFields),
        ];

        $additional = array_filter($additional);

        if (empty($additional)) {
            return $uri;
        }

        return $uri.'?'.implode('&', $additional);
    }

    /**
     * @param array $fields
     * @return string
     */
    protected function parseRequestFields(array $fields = []): string
    {
        $string = [];

        foreach ($fields as $field => $value) {
            $string[] = $field.'='.$value;
        }

        return implode('&', $string);
    }

    /**
     * @param array $fields
     * @return string
     */
    protected function parseResponseFields(array $fields = []): string
    {
        $result = [];

        foreach ($fields as $field => $value) {
            if (is_array($value)) {
                $result[] = $field.'('.$this->parseResponseFields($value).')';
                continue;
            }

            $result[] = $value;
        }

        if (empty($result)) {
            return '';
        }

        return implode(',', $result);
    }

    /**
     * @param bool $withAuth
     * @param array $options
     * @return Client
     */
    protected function getClient(bool $withAuth = true, array $options = []): Client
    {
        if (!isset($options['base_uri'])) {
            $options['base_uri'] = $this->url;
        }

        if (!isset($options['headers'])) {
            $options['headers'] = [];
        }

        $options['headers']['Accept'] = 'application/json';

        if ($withAuth && !isset($options['headers']['Authorization'])) {
            $options['headers']['Authorization'] = $this->tokenType.' '.$this->token;
        }

        return new Client($options);
    }

    /**
     * @throws GuzzleException
     */
    private function fetchToken(): void
    {
        $options = [
            'headers' => [
                'Authorization' => 'Basic '.base64_encode($this->clientId.':'.$this->clientSecret),
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
