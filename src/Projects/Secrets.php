<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Secrets\DefaultBundle;
use Swe\SpaceSDK\Projects\Secrets\InDefaultBundle;

/**
 * Class Secrets
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Secrets extends AbstractApi
{
    /**
     * Update an existing project secret
     *
     * Permissions that may be checked: Project.Secrets.Edit
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateSecret(string $id, array $data = []): void
    {
        $uri = 'projects/secrets/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing project secret
     *
     * Permissions that may be checked: Project.Secrets.Delete
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteSecret(string $id): void
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
