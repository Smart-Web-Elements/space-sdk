<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Blog
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Blog extends AbstractApi
{
    /**
     * Permissions that may be checked: Article.Publish
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function publishBlogPost(array $data, array $response): array
    {
        $uri = 'blog';
        $required = [
            'title' => self::TYPE_STRING,
            'content' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Permissions that may be checked: Article.Import
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function importBlogPosts(array $data, array $response): array
    {
        $uri = 'blog/import';
        $required = [
            'metadata' => [
                'importSource' => self::TYPE_STRING,
            ],
            'articles' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Permissions that may be checked: Article.View
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllBlogPosts(array $data, array $response): array
    {
        $uri = 'blog';

        return $this->client->get($this->buildUrl($uri), $response, $data);
    }

    /**
     * Permissions that may be checked: Article.View
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getStats(array $data, array $response): array
    {
        $uri = 'blog/stats';

        return $this->client->get($this->buildUrl($uri), $response, $data);
    }

    /**
     * Permissions that may be checked: Article.View
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getBlogPostByAlias(array $data, array $response): array
    {
        $uri = 'blog/alias:{alias}';
        $required = [
            'alias' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'alias' => $data['alias'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Article.View
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getBlogPostByExternalId(array $data, array $response): array
    {
        $uri = 'blog/external-id:{id}';
        $required = [
            'id' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $data['id'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Article.View
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getBlogPost(array $data, array $response): array
    {
        $uri = 'blog/{id}';
        $required = [
            'id' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $data['id'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Article.Publish
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateBlogPost(array $data, array $response): array
    {
        $uri = 'blog/{id}';
        $required = [
            'id' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $data['id'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Permissions that may be checked: Article.Unpublish
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function unpublishBlogPost(array $data): void
    {
        $uri = 'blog/{id}';
        $required = [
            'id' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $data['id'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}