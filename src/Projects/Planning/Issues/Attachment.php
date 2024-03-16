<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Attachment
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Attachment extends AbstractApi
{
    /**
     * Add attachment to an existing issue in a project
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param string $project
     * @param string $issueId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addAttachment(string $project, string $issueId, array $data): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/attachment';
        $required = [
            'attachment' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove attachment from an existing issue in a project
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param string $project
     * @param string $issueId
     * @param string $attachmentId
     * @return void
     * @throws GuzzleException
     */
    final public function removeAttachment(string $project, string $issueId, string $attachmentId): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/attachment/{attachmentId}';
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
            'attachmentId' => $attachmentId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
