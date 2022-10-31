<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class NavBarProjects
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class NavBarProjects extends AbstractApi
{
    /**
     * Add a project to the navigation bar
     *
     * @param array $profile
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createNavBarProject(array $profile, array $data): void
    {
        $uri = 'team-directory/profiles/{profile}/nav-bar-projects';
        $required = [
            'project' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Add a project to the navigation bar
     *
     * @param array $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllNavBarProjects(array $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/nav-bar-projects';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Remove a project from the navigation bar
     *
     * @param array $profile
     * @param array $project
     * @return void
     * @throws GuzzleException
     */
    final public function deleteNavBarProject(array $profile, array $project): void
    {
        $uri = 'team-directory/profiles/{profile}/nav-bar-projects/{project}';
        $uriArguments = [
            'profile' => $profile,
            'project' => $project,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
