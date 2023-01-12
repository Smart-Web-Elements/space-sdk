<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Params\DefaultBundle;
use Swe\SpaceSDK\Projects\Params\InDefaultBundle;
use Swe\SpaceSDK\Type;

/**
 * Class Params
 * Generated at 2023-01-12 02:00
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Params extends AbstractApi
{
    /**
     * Update an existing project parameter
     *
     * Permissions that may be checked: Project.Params.Modify
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateParam(string $id, array $data): void
    {
        $uri = 'projects/params/{id}';
        $required = [
            'value' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing project parameter
     *
     * Permissions that may be checked: Project.Params.Delete
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteParam(string $id): void
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
    final public function defaultBundle(): DefaultBundle
    {
        return new DefaultBundle($this->client);
    }

    /**
     * @return InDefaultBundle
     */
    final public function inDefaultBundle(): InDefaultBundle
    {
        return new InDefaultBundle($this->client);
    }
}
