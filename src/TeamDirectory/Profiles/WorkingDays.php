<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class WorkingDays
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class WorkingDays extends AbstractApi
{
    /**
     * Returns pairs of profiles and their working days. If several working days settings are defined for the same
     * profile then several pairs are returned.
     *
     * Permissions that may be checked: Profile.WorkingDays.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function queryAllWorkingDays(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/working-days';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Permissions that may be checked: Profile.WorkingDays.Edit
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addWorkingDays(string $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/working-days';
        $required = [
            'workingDaysSpec' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Permissions that may be checked: Profile.WorkingDays.View
     *
     * @param string $profile
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function queryWorkingDaysForAProfile(string $profile, array $request = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/working-days';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Permissions that may be checked: Profile.WorkingDays.Edit
     *
     * @param string $profile
     * @param string $workingDaysId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateWorkingDays(string $profile, string $workingDaysId, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/working-days/{workingDaysId}';
        $required = [
            'workingDaysSpec' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
            'workingDaysId' => $workingDaysId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Permissions that may be checked: Profile.WorkingDays.Edit
     *
     * @param string $profile
     * @param string $workingDaysId
     * @return void
     * @throws GuzzleException
     */
    public function deleteWorkingDays(string $profile, string $workingDaysId): void
    {
        $uri = 'team-directory/profiles/{profile}/working-days/{workingDaysId}';
        $uriArguments = [
            'profile' => $profile,
            'workingDaysId' => $workingDaysId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}