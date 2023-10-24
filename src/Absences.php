<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Absences\AbsenceReasons;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Absences
 * Generated at 2023-10-24 02:15
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Absences extends AbstractApi
{
    /**
     * Create an absence for a given profile (member)
     *
     * Permissions that may be checked: Profile.Absences.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createAbsence(array $data, array $response = []): array
    {
        $uri = 'absences';
        $required = [
            'member' => Type::String,
            'reason' => Type::String,
            'description' => Type::String,
            'since' => Type::Date,
            'till' => Type::Date,
            'icon' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Approve/unapprove an existing absence. Setting approve to true will approve the absence, false will remove the approval.
     *
     * Permissions that may be checked: Profile.Absences.Approve
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function approveAbsence(string $id, array $data): void
    {
        $uri = 'absences/{id}/approve';
        $required = [
            'approve' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Search absences. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Profile.Absences.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllAbsences(array $request = [], array $response = []): array
    {
        $uri = 'absences';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get absences for a given profile ID
     *
     * Permissions that may be checked: Profile.Absences.View
     *
     * @param string $member
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllAbsencesByMember(string $member, array $response = []): array
    {
        $uri = 'absences/member:{member}';
        $uriArguments = [
            'member' => $member,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Get an absence
     *
     * Permissions that may be checked: Profile.Absences.View
     *
     * @param string $id
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getAbsence(string $id, array $response = []): ?array
    {
        $uri = 'absences/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update an existing absence. Optional parameters will be ignored when not specified and updated otherwise.
     *
     * Permissions that may be checked: Profile.Absences.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateAbsence(string $id, array $data, array $response = []): array
    {
        $uri = 'absences/{id}';
        $required = [
            'available' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Archive/restore an existing absence. Setting delete to true will archive the absence, false will restore it.
     *
     * Permissions that may be checked: Profile.Absences.Edit, Profile.Absences.EditPast
     *
     * @param string $id
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    final public function deleteAbsence(string $id, array $request = []): void
    {
        $uri = 'absences/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }

    /**
     * Delete approval for a given absence
     *
     * Permissions that may be checked: Profile.Absences.Approve
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteAbsenceApproval(string $id): void
    {
        $uri = 'absences/{id}/delete-approval';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return AbsenceReasons
     */
    final public function absenceReasons(): AbsenceReasons
    {
        return new AbsenceReasons($this->client);
    }
}
