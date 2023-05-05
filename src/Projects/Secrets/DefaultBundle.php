<?php

namespace Swe\SpaceSDK\Projects\Secrets;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class DefaultBundle
 * Generated at 2023-05-05 02:00
 *
 * @package Swe\SpaceSDK\Projects\Secrets
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class DefaultBundle extends AbstractApi
{
    /**
     * Create a new project secret. The secret value should be provided either as a base64-encoded value in [valueBase64], or as a reference to another secret in [secretReference].
     *
     * Permissions that may be checked: Project.Secrets.Create
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createDefaultBundle(array $data): string
    {
        $uri = 'projects/secrets/default-bundle';
        $required = [
            'project' => Type::String,
            'key' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * List project secrets in a parameter bundle
     *
     * Permissions that may be checked: Project.Secrets.ViewKeys
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllDefaultBundle(array $request, array $response = []): array
    {
        $uri = 'projects/secrets/default-bundle';
        $required = [
            'project' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
