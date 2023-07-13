<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Dashboards
 * Generated at 2023-07-13 02:15
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Dashboards extends AbstractApi
{
    /**
     * @param string $dashboard
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getDashboard(string $dashboard, array $response = []): ?array
    {
        $uri = 'team-directory/profiles/dashboards/{dashboard}';
        $uriArguments = [
            'dashboard' => $dashboard,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $dashboard
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateDashboard(string $dashboard, array $data): void
    {
        $uri = 'team-directory/profiles/dashboards/{dashboard}';
        $required = [
            'data' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'dashboard' => $dashboard,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
