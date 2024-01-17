<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Reactions
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Reactions extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.AddMessageReactions, Profile.DirectMessages.AddReactions, Article.Comments.AddReactions, Project.CodeReview.AddReactions
     *
     * @param string $item
     * @param string $emoji
     * @return void
     * @throws GuzzleException
     */
    final public function addReaction(string $item, string $emoji): void
    {
        $uri = 'reactions/{item}/{emoji}';
        $uriArguments = [
            'item' => $item,
            'emoji' => $emoji,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Permissions that may be checked: Channel.ViewMessageReactions, Profile.DirectMessages.ViewReactions, Project.CodeReview.ViewReactions, Article.Comments.ViewReactions
     *
     * @param string $item
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function listReactions(string $item, array $response = []): array
    {
        $uri = 'reactions/{item}';
        $uriArguments = [
            'item' => $item,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Channel.ViewMessageReactions, Profile.DirectMessages.ViewReactions, Project.CodeReview.ViewReactions, Article.Comments.ViewReactions
     *
     * @param string $item
     * @param string $emoji
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function listReactedUsersAndApplications(string $item, string $emoji, array $response = []): array
    {
        $uri = 'reactions/{item}/{emoji}';
        $uriArguments = [
            'item' => $item,
            'emoji' => $emoji,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Channel.AddMessageReactions, Profile.DirectMessages.AddReactions, Article.Comments.AddReactions, Project.CodeReview.AddReactions
     *
     * @param string $item
     * @param string $emoji
     * @return void
     * @throws GuzzleException
     */
    final public function removeReaction(string $item, string $emoji): void
    {
        $uri = 'reactions/{item}/{emoji}';
        $uriArguments = [
            'item' => $item,
            'emoji' => $emoji,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
