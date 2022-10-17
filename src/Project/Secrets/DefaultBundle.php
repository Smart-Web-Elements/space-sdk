<?php

namespace Swe\SpaceSDK\Project\Secrets;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class DefaultBundle
 *
 * @package Swe\SpaceSDK\Project\Secrets
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class DefaultBundle extends AbstractApi
{
    /**
     * Create a new secret in the default parameter bundle. Value is base64 encoded bytes of the secret value, possibly
     * after client side encryption. If the secret value bytes are encrypted then the id of the Space public key must be
     * provided.
     *
     * Permissions that may be checked: Projects.Secrets.Create
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createDefaultBundle(array $data): string
    {
        $uri = 'projects/secrets/default-bundle';
        $required = [
            'project' => self::TYPE_STRING,
            'key' => self::TYPE_STRING,
            'valueBase64' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * List project secrets in a parameter bundle.
     *
     * Permissions that may be checked: Project.Secrets.ViewKeys
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllDefaultBundle(array $request, array $response = []): array
    {
        $uri = 'projects/secrets/default-bundle';
        $required = [
            'projects' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}