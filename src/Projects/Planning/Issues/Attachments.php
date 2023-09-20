<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Attachments
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Attachments extends AbstractApi
{
    /**
     * Add attachments to an existing issue in a project
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
    final public function addAttachments(string $project, string $issueId, array $data): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/attachments';
        $required = [
            'attachments' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove attachments from an existing issue in a project
     *
     * Permissions that may be checked: Project.Issues.Edit
     *
     * @param string $project
     * @param string $issueId
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeAttachments(string $project, string $issueId, array $request): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/attachments';
        $required = [
            'identities' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
