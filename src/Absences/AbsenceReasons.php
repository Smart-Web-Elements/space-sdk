<?php

namespace Swe\SpaceSDK\Absences;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class AbsencesReasons
 *
 * @package Swe\SpaceSDK\Absences
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class AbsenceReasons extends AbstractApi
{
    /**
     * Create a new absence reason.
     *
     * Permissions that may be checked: Absence.EditTypes
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createAbsenceReason(array $data, array $response = []): array
    {
        $uri = 'absences/absence-reasons';
        $required = [
            'name' => self::TYPE_STRING,
            'description' => self::TYPE_STRING,
            'defaultAvailability' => self::TYPE_BOOLEAN,
            'approvalRequired' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Get available absence reasons.
     *
     * Permissions that may be checked: Absences.ViewTypes
     *
     * @param bool $withArchived
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllAbsenceReasons(bool $withArchived = false, array $response = []): array
    {
        $uri = 'absences/absence-reasons';
        $request = [
            'withArchived' => $withArchived,
        ];

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Get an absence reason.
     *
     * Permissions that may be checked: Absences.ViewTypes
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAbsenceReason(string $id, array $response = []): array
    {
        $uri = 'absences/absence-reasons/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Update an existing absence reason.
     *
     * Permissions that may be checked: Absences.EditTypes
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateAbsenceReason(string $id, array $data, array $response = []): array
    {
        $uri = 'absences/absence-reasons/{id}';
        $required = [
            'name' => self::TYPE_STRING,
            'description' => self::TYPE_STRING,
            'defaultAvailability' => self::TYPE_BOOLEAN,
            'approvalRequired' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Archive/restore an existing absence reason. Setting delete to true will archive the absence reason, false will
     * restore it.
     *
     * Permissions that may be checked: Absence.EditTypes
     *
     * @param string $id
     * @param bool $delete
     * @return void
     * @throws GuzzleException
     */
    public function deleteAbsenceReason(string $id, bool $delete = true): void
    {
        $uri = 'absences/absence-reasons/{id}';
        $uriArguments = [
            'id' => $id,
        ];
        $request = [
            'delete' => $delete,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}