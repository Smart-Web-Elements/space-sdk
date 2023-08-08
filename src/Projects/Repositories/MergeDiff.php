<?php

namespace Swe\SpaceSDK\Projects\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class MergeDiff
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\Projects\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class MergeDiff extends AbstractApi
{
    /**
     * @param string $project
     * @param string $repository
     * @param string $baseBlobId
     * @param string $sourceBlobId
     * @param string $targetBlobId
     * @param array $request
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getInlineDiff(
        string $project,
        string $repository,
        string $baseBlobId,
        string $sourceBlobId,
        string $targetBlobId,
        array $request,
        array $response = [],
    ): ?array
    {
        $uri = 'projects/{project}/repositories/{repository}/merge-diff/base:{baseBlobId}/source:{sourceBlobId}/target:{targetBlobId}/inline';
        $required = [
            'entryType' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
            'baseBlobId' => $baseBlobId,
            'sourceBlobId' => $sourceBlobId,
            'targetBlobId' => $targetBlobId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
