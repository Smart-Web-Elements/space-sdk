<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Secrets\DefaultBundle;

/**
 * Class Secrets
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Secrets extends AbstractApi
{
    /**
     * Update an existing project secret.
     *
     * Permissions that may be checked: Project.Secrets.Edit
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateSecret(string $id, array $data): void
    {
        $uri = 'projects/secrets/{id}';
        $required = [
            'valueBase64' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing project secret.
     *
     * Permissions that may be checked: Project.Secrets.Delete
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteSecret(string $id): void
    {
        $uri = 'projects/secrets/{id}';
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