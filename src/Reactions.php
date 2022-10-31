<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Reactions
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Reactions extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.AddMessageReactions, Profile.DirectMessages.AddReactions, Article.Comments.AddReactions, Project.CodeReview.AddReactions
     *
     * @param array $item
     * @param string $emoji
     * @return void
     * @throws GuzzleException
     */
    final public function addReaction(array $item, string $emoji): void
    {
        $uri = 'reactions/{item}/{emoji}';
        $uriArguments = [
            'item' => $item,
            'emoji' => $emoji,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Permissions that may be checked: Channel.ViewMessageReactions, Profile.DirectMessages.ViewReactions, Project.CodeReview.ViewReactions, Article.Comments.ViewReactions
     *
     * @param array $item
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function listReactions(array $item, array $response = []): array
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
     * @param array $item
     * @param string $emoji
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function listReactedUsersAndApplications(array $item, string $emoji, array $response = []): array
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
     * @param array $item
     * @param string $emoji
     * @return void
     * @throws GuzzleException
     */
    final public function removeReaction(array $item, string $emoji): void
    {
        $uri = 'reactions/{item}/{emoji}';
        $uriArguments = [
            'item' => $item,
            'emoji' => $emoji,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
