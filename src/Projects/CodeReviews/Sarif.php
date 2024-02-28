<?php

namespace Swe\SpaceSDK\Projects\CodeReviews;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Sarif
 * Generated at 2024-02-28 02:00
 *
 * @package Swe\SpaceSDK\Projects\CodeReviews
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Sarif extends AbstractApi
{
    /**
     * @param string $project
     * @param string $reviewId
     * @param string $commitId
     * @return void
     * @throws GuzzleException
     */
    final public function uploadSarifReport(string $project, string $reviewId, string $commitId): void
    {
        $uri = 'projects/{project}/code-reviews/{reviewId}/sarif/{commitId}';
        $uriArguments = [
            'project' => $project,
            'reviewId' => $reviewId,
            'commitId' => $commitId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }
}
