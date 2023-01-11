<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Profiles\Checklists\FullChecklistTree;
use Swe\SpaceSDK\TeamDirectory\Profiles\Checklists\Starred;
use Swe\SpaceSDK\Type;

/**
 * Class Checklists
 * Generated at 2023-01-11 02:01
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Checklists extends AbstractApi
{
    /**
     * Create a new checklist associated with the profile
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2022-04-08. Use POST on team-directory/profiles/{profile}/documents
     */
    final public function createChecklist(string $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/checklists';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Create a new checklist associated with the profile using tab indented lines as checkable items.
     * The items with the same indent level will be placed one under the other.
     * An issue URL will be converted into the corresponding issue.
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2022-04-08. Use POST on team-directory/profiles/{profile}/documents
     */
    final public function importChecklist(string $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/checklists/import';
        $required = [
            'name' => Type::String,
            'tabIndentedLines' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Tab indented lines are converted into checkable items following the same rules as in Import Checklist.
     * The result is placed inside of the specified personal checklist.
     *
     * @param string $profile
     * @param string $checklistId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function importChecklistLines(string $profile, string $checklistId, array $data): void
    {
        $uri = 'team-directory/profiles/{profile}/checklists/{checklistId}/import';
        $required = [
            'targetParentId' => Type::String,
            'tabIndentedLines' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
            'checklistId' => $checklistId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Get all existing checklists associated with the profile
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2022-04-08. Use GET team-directory/profiles/{profile}/documents/folders/{folder}/documents
     */
    final public function getAllChecklists(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/checklists';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update an existing checklist associated with the profile
     *
     * @param string $profile
     * @param string $checklistId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2022-04-08. Use PATCH on team-directory/profiles/{profile}/documents/{documentId}
     */
    final public function updateChecklist(string $profile, string $checklistId, array $data = []): void
    {
        $uri = 'team-directory/profiles/{profile}/checklists/{checklistId}';
        $uriArguments = [
            'profile' => $profile,
            'checklistId' => $checklistId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing checklist associated with the profile
     *
     * @param string $profile
     * @param string $checklistId
     * @return void
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2022-04-08. Use DELETE on profiles/{profile}/documents/{documentId}
     */
    final public function deleteChecklist(string $profile, string $checklistId): void
    {
        $uri = 'team-directory/profiles/{profile}/checklists/{checklistId}';
        $uriArguments = [
            'profile' => $profile,
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
