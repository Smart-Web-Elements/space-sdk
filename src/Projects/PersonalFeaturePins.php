<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class PersonalFeaturePins
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class PersonalFeaturePins extends AbstractApi
{
    /**
     * Update list of project items pinned for the project personally for you
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updatePersonalFeaturePin(string $project, array $data): void
    {
        $uri = 'projects/{project}/personal-feature-pins';
        $required = [
            'featurePins' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
