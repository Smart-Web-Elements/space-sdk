<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Absences\AbsencesReasons;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Absences
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Absences extends AbstractApi
{
    /**
     * Permissions that may be checked: Profile.Absences.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function createAbsence(array $data, array $response): array
    {
        $uri = 'absences';
        $required = [
            'member' => self::TYPE_STRING,
            'reason' => self::TYPE_STRING,
            'description' => self::TYPE_STRING,
            'since' => self::TYPE_DATE,
            'till' => self::TYPE_DATE,
            'icon' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Approve/unapprove an existing absence. Setting approve to true will approve the absence, false will remove the
     * approval.
     *
     * Permissions that may be checked: Profile.Absences.Approve
     *
     * @param string $id
     * @param bool $approve
     * @return void
     * @throws GuzzleException
     */
    public function approveAbsence(string $id, bool $approve): void
    {
        $uri = 'absences/{id}/approve';
        $uriArguments = [
            'id' => $id,
        ];
        $data = [
            'approve' => $approve,
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
    public function getAllAbsences(array $request = [], array $response = []): array
    {
        $uri = 'absences';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Get absences for a given profile ID.
     *
     * Permissions that may be checked: Profile.Absences.View
     *
     * @param string $member
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllAbsencesByMember(string $member, array $response = []): array
    {
        $uri = 'absences/member:{member}';
        $uriArguments = [
            'member' => $member,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Get an absence.
     *
     * Permissions that may be checked: Profile.Absences.View
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAbsence(string $id, array $response = []): array
    {
        $uri = 'absences/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
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
    public function updateAbsence(string $id, array $data, array $response = []): array
    {
        $uri = 'absences/{id}';
        $required = [
            'available' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Archive/restore an existing absence. Setting delete to true will archive the absence, false will restore it.
     *
     * Permissions that may be checked: Profile.Absences.Edit, Profile.Absences.EditPast
     *
     * @param string $id
     * @param bool $delete
     * @return void
     * @throws GuzzleException
     */
    public function deleteAbsence(string $id, bool $delete = true): void
    {
        $uri = 'absences/{id}';
        $uriArguments = [
            'id' => $id,
        ];
        $request = [
            'delete' => $delete,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }

    /**
     * Delete approval for a given absence.
     *
     * Permissions that may be checked: Profile.Absences.Approve
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteAbsenceApproval(string $id): void
    {
        $uri = 'absences/{id}/delete-approval';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return AbsencesReasons
     */
    public function absenceReasons(): AbsencesReasons
    {
        return new AbsencesReasons($this->client);
    }
}