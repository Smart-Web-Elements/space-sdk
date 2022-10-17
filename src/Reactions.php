<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Reactions
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Reactions extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.AddMessageReactions, Profile.DirectMessages.AddReactions,
     * Article.Comments.AddReactions, Project.CodeReview.AddReactions
     *
     * @param array $data
     * @return void
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function addReaction(array $data): void
    {
        $uri = 'reactions/{item}/{emoji}';
        $required = [
            'item' => 'string',
            'emoji' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'item' => $data['item'],
            'emoji' => $data['emoji'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Permissions that may be checked: Channel.ViewMessageReactions, Profile.DirectMessages.ViewReactions,
     * Project.CodeReview.ViewReactions, Article.Comments.ViewReactions
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function listReactions(array $data, array $response): array
    {
        $uri = 'reactions/{item}';
        $required = [
            'item' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'item' => $data['item'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Channel.ViewMessageReactions, Profile.DirectMessages.ViewReactions,
     * Project.CodeReview.ViewReactions, Article.Comments.ViewReactions
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function listReactedUsersAndApplications(array $data, array $response): array
    {
        $uri = 'reactions/{item}/{emoji}';
        $required = [
            'item' => 'string',
            'emoji' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'item' => $data['item'],
            'emoji' => $data['emoji'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Channel.AddMessageReactions, Profile.DirectMessages.AddReactions,
     * Article.Comments.AddReactions, Project.CodeReview.AddReactions
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function removeReaction(array $data): void
    {
        $uri = 'reactions/{item}/{emoji}';
        $required = [
            'item' => 'string',
            'emoji' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'item' => $data['item'],
            'emoji' => $data['emoji'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}