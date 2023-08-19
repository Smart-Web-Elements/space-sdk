<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class NavBarMenuItems
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class NavBarMenuItems extends AbstractApi
{
    /**
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllNavBarMenuItems(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/nav-bar-menu-items';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Toggle visibility for a given navigation bar item
     *
     * @param string $profile
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateNavBarMenuItem(string $profile, array $data): void
    {
        $uri = 'team-directory/profiles/{profile}/nav-bar-menu-items';
        $required = [
            'item' => Type::String,
            'enabled' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
