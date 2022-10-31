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
final class Blog extends AbstractApi
{
    /**
     * Permissions that may be checked: Article.Publish
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function publishBlogPost(array $data, array $response = []): array
    {
        $uri = 'blog';
        $required = [
            'title' => Type::String,
            'content' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
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
    final public function importBlogPosts(array $data, array $response = []): array
    {
        $uri = 'blog/import';
        $required = [
            'metadata' => [
                'importSource' => Type::String,
            ],
            'articles' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Article.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllBlogPosts(array $request = [], array $response = []): array
    {
        $uri = 'blog';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Permissions that may be checked: Article.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getStats(array $request = [], array $response = []): array
    {
        $uri = 'blog/stats';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Permissions that may be checked: Article.View
     *
     * @param string $alias
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getBlogPostByAlias(string $alias, array $response = []): ?array
    {
        $uri = 'blog/alias:{alias}';
        $uriArguments = [
            'alias' => $alias,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Article.View
     *
     * @param string $id
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getBlogPostByExternalId(string $id, array $response = []): ?array
    {
        $uri = 'blog/external-id:{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Article.View
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getBlogPost(string $id, array $response = []): array
    {
        $uri = 'blog/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Article.Publish
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateBlogPost(string $id, array $data = [], array $response = []): array
    {
        $uri = 'blog/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Article.Unpublish
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function unpublishArticle(string $id): void
    {
        $uri = 'blog/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
