<?php

namespace Swe\SpaceSDK\Absences;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class AbsenceReasons
 * Generated at 2023-10-24 02:15
 *
 * @package Swe\SpaceSDK\Absences
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class AbsenceReasons extends AbstractApi
{
    /**
     * Create a new absence reason
     *
     * Permissions that may be checked: Absences.EditTypes
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createAbsenceReason(array $data, array $response = []): array
    {
        $uri = 'absences/absence-reasons';
        $required = [
            'name' => Type::String,
            'description' => Type::String,
            'defaultAvailability' => Type::Boolean,
            'approvalRequired' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Get available absence reasons
     *
     * Permissions that may be checked: Absences.ViewTypes
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllAbsenceReasons(array $request = [], array $response = []): array
    {
        $uri = 'absences/absence-reasons';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get an absence reason
     *
     * Permissions that may be checked: Absences.ViewTypes
     *
     * @param string $id
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getAbsenceReason(string $id, array $response = []): ?array
    {
        $uri = 'absences/absence-reasons/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update an existing absence reason
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
    final public function updateAbsenceReason(string $id, array $data, array $response = []): array
    {
        $uri = 'absences/absence-reasons/{id}';
        $required = [
            'name' => Type::String,
            'description' => Type::String,
            'defaultAvailability' => Type::Boolean,
            'approvalRequired' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Archive/restore an existing absence reason. Setting delete to true will archive the absence reason, false will restore it.
     *
     * Permissions that may be checked: Absences.EditTypes
     *
     * @param string $id
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    final public function deleteAbsenceReason(string $id, array $request = []): void
    {
        $uri = 'absences/absence-reasons/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
