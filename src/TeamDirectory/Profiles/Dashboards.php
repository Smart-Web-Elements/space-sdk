<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Dashboards
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Dashboards extends AbstractApi
{
    /**
     * @param string $dashboard
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getDashboard(string $dashboard, array $response = []): array
    {
        $uri = 'team-directory/profiles/dashboards/{dashboard}';
        $uriArguments = [
            'dashboard' => $dashboard,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @param string $dashboard
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateDashboard(string $dashboard, array $data): void
    {
        $uri = 'team-directory/profiles/dashboards/{dashboard}';
        $required = [
            'data' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'dashboard' => $dashboard,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}