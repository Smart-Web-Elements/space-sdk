<?php

namespace Swe\SpaceSDK\Projects\Planning;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Planning\Checklists\FullChecklistTree;
use Swe\SpaceSDK\Projects\Planning\Checklists\Starred;
use Swe\SpaceSDK\Type;

/**
 * Class Checklists
 * Generated at 2023-01-11 02:01
 *
 * @package Swe\SpaceSDK\Projects\Planning
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Checklists extends AbstractApi
{
    /**
     * Create a new checklist in a project
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2022-04-08. Use POST on projects/{project}/documents
     */
    final public function createChecklist(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/planning/checklists';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Create a new checklist in a project using tab indented lines as checkable items.
     * The items with the same indent level will be placed one under the other.
     * An issue URL will be converted into the corresponding issue.
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2022-04-08. Use POST on projects/{project}/documents
     */
    final public function importChecklist(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/planning/checklists/import';
        $required = [
            'name' => Type::String,
            'tabIndentedLines' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Tab indented lines are converted into checkable items following the same rules as in Import Checklist.
     * The result is placed inside of the specified project checklist.
     *
     * @param string $project
     * @param string $checklistId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function importChecklistLines(string $project, string $checklistId, array $data): void
    {
        $uri = 'projects/{project}/planning/checklists/{checklistId}/import';
        $required = [
            'targetParentId' => Type::String,
            'tabIndentedLines' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'checklistId' => $checklistId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Search existing checklists in a project
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2022-04-08. Use GET on projects/{project}/documents/folders/{folder}/documents
     */
    final public function getAllChecklists(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/planning/checklists';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Update an existing checklist in a project
     *
     * @param string $project
     * @param string $checklistId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2022-04-08. Use PATCH on projects/{project}/documents/{documentId}
     */
    final public function updateChecklist(string $project, string $checklistId, array $data = []): void
    {
        $uri = 'projects/{project}/planning/checklists/{checklistId}';
        $uriArguments = [
            'project' => $project,
            'checklistId' => $checklistId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing checklist in a project
     *
     * @param string $project
     * @param string $checklistId
     * @return void
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2022-04-08. Use DELETE on projects/{project}/documents/{documentId}
     */
    final public function deleteChecklist(string $project, string $checklistId): void
    {
        $uri = 'projects/{project}/planning/checklists/{checklistId}';
        $uriArguments = [
            'project' => $project,
            'checklistId' => $checklistId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Starred
     */
    final public function starred(): Starred
    {
        return new Starred($this->client);
    }

    /**
     * @return FullChecklistTree
     */
    final public function fullChecklistTree(): FullChecklistTree
    {
        return new FullChecklistTree($this->client);
    }
}
