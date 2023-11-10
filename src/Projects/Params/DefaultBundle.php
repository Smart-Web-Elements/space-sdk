<?php

namespace Swe\SpaceSDK\Projects\Params;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class DefaultBundle
 * Generated at 2023-11-10 04:08
 *
 * @package Swe\SpaceSDK\Projects\Params
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class DefaultBundle extends AbstractApi
{
    /**
     * Create a new project parameter in the default parameter bundle
     *
     * Permissions that may be checked: Project.Params.Modify
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createDefaultBundle(array $data): string
    {
        $uri = 'projects/params/default-bundle';
        $required = [
            'project' => Type::String,
            'key' => Type::String,
            'value' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * List project parameters in a parameter bundle
     *
     * Permissions that may be checked: Project.Params.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllDefaultBundle(array $request, array $response = []): array
    {
        $uri = 'projects/params/default-bundle';
        $required = [
            'project' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
