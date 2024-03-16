<?php

namespace Swe\SpaceSDK\Projects\Params;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class InDefaultBundle
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects\Params
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class InDefaultBundle extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Params.Modify
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2021.05.18. Use the method that accepts a project identifier instead
     */
    final public function createInDefaultBundle(array $data): string
    {
        $uri = 'projects/params/in-default-bundle';
        $required = [
            'projectId' => Type::String,
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
     * @deprecated This method is deprecated since 2021.05.18. Use the method that accepts a project identifier instead
     */
    final public function getAllInDefaultBundle(array $request, array $response = []): array
    {
        $uri = 'projects/params/in-default-bundle';
        $required = [
            'projectId' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
