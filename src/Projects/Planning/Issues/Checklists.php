<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Checklists
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Checklists extends AbstractApi
{
    /**
     * Add the checklist to an existing issue in a project.
     *
     * Permissions that may be checked: Project.Issues.Edit, Documents.Edit
     *
     * @param string $project
     * @param string $issueId
     * @param string $checklistId
     * @return void
     * @throws GuzzleException
     */
    public function addIssueChecklist(string $project, string $issueId, string $checklistId): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/checklists/{checklistId}';
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
            'checklistId' => $checklistId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Remove the checklist from an existing issue in a project.
     *
     * Permissions that may be checked: Project.Issues.Edit, Documents.Edit
     *
     * @param string $project
     * @param string $issueId
     * @param string $checklistId
     * @return void
     * @throws GuzzleException
     */
    public function removeIssueChecklist(string $project, string $issueId, string $checklistId): void
    {
        $uri = 'projects/{project}/planning/issues/{issueId}/checklists/{checklistId}';
        $uriArguments = [
            'project' => $project,
            'issueId' => $issueId,
            'checklistId' => $checklistId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}