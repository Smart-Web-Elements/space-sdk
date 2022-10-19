<?php

namespace Swe\SpaceSDK\Projects\Params;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class DefaultBundle
 *
 * @package Swe\SpaceSDK\Projects\Params
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class DefaultBundle extends AbstractApi
{
    /**
     * Create a new project parameter in the default parameter bundle.
     *
     * Permissions that may be checked: Project.Params.Modify
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createDefaultBundle(array $data): string
    {
        $uri = 'projects/params/default-bundle';
        $required = [
            'project' => self::TYPE_STRING,
            'key' => self::TYPE_STRING,
            'value' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * List project parameters in a parameter bundle.
     *
     * Permissions that may be checked: Project.Params.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllDefaultBundle(array $request, array $response = []): array
    {
        $uri = 'projects/params/default-bundle';
        $required = [
            'project' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}