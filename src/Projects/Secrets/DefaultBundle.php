<?php

namespace Swe\SpaceSDK\Projects\Secrets;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class DefaultBundle
 *
 * @package Swe\SpaceSDK\Projects\Secrets
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class DefaultBundle extends AbstractApi
{
    /**
     * Create a new secret in the default parameter bundle. Value is base64 encoded bytes of the secret value, possibly after client side encryption. If the secret value bytes are encrypted then the id of the Space public key must be provided
     *
     * Permissions that may be checked: Project.Secrets.Create
     *
     * @param array $data
     * @param array $response
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
            'valueBase64' => Type::String,
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
