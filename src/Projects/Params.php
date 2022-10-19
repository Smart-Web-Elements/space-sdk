<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Params\DefaultBundle;

/**
 * Class Params
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Params extends AbstractApi
{
    /**
     * Update an existing project parameter.
     *
     * Permissions that may be checked: Project.Params.Modify
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateParam(string $id, array $data): void
    {
        $uri = 'projects/params/{id}';
        $required = [
            'value' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing project parameter.
     *
     * Permissions that may be checked: Project.Params.Delete
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteParam(string $id): void
    {
        $uri = 'projects/params/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return DefaultBundle
     */
    public function defaultBundle(): DefaultBundle
    {
        return new DefaultBundle($this->client);
    }
}