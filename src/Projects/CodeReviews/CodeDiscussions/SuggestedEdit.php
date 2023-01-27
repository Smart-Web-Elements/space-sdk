<?php

namespace Swe\SpaceSDK\Projects\CodeReviews\CodeDiscussions;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class SuggestedEdit
 * Generated at 2023-01-27 02:00
 *
 * @package Swe\SpaceSDK\Projects\CodeReviews\CodeDiscussions
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class SuggestedEdit extends AbstractApi
{
    /**
     * @param string $project
     * @param string $discussionId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function alterSuggestedEdit(string $project, string $discussionId, array $data): void
    {
        $uri = 'projects/{project}/code-reviews/code-discussions/{discussionId}/suggested-edit';
        $required = [
            'text' => Type::String,
            'attachments' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'discussionId' => $discussionId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
