<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Responsibilities\Assignees;
use Swe\SpaceSDK\Projects\Responsibilities\Scheme;
use Swe\SpaceSDK\Projects\Responsibilities\Subjects;
use Swe\SpaceSDK\Type;

/**
 * Class Responsibilities
 * Generated at 2024-02-28 02:00
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Responsibilities extends AbstractApi
{
    /**
     * Add a responsibility for a given subject ID
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addResponsibility(array $data): string
    {
        $uri = 'projects/responsibilities';
        $required = [
            'subjectId' => Type::String,
            'summary' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * Edit an existing responsibility
     *
     * @param string $responsibilityId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateResponsibility(string $responsibilityId, array $data): void
    {
        $uri = 'projects/responsibilities/{responsibilityId}';
        $required = [
            'summary' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'responsibilityId' => $responsibilityId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing responsibility
     *
     * @param string $responsibilityId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteResponsibility(string $responsibilityId): void
    {
        $uri = 'projects/responsibilities/{responsibilityId}';
        $uriArguments = [
            'responsibilityId' => $responsibilityId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Subjects
     */
    final public function subjects(): Subjects
    {
        return new Subjects($this->client);
    }

    /**
     * @return Scheme
     */
    final public function scheme(): Scheme
    {
        return new Scheme($this->client);
    }

    /**
     * @return Assignees
     */
    final public function assignees(): Assignees
    {
        return new Assignees($this->client);
    }
}
