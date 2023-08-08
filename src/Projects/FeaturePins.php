<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class FeaturePins
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class FeaturePins extends AbstractApi
{
    /**
     * Update list of project items pinned for the project by default
     *
     * Permissions that may be checked: Project.ManagePins
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateFeaturePin(string $project, array $data): void
    {
        $uri = 'projects/{project}/feature-pins';
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
