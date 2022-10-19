<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Responsibilities\Assignees;
use Swe\SpaceSDK\Projects\Responsibilities\Scheme;
use Swe\SpaceSDK\Projects\Responsibilities\Subjects;

/**
 * Class Responsibilities
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Responsibilities extends AbstractApi
{
    /**
     * Add a responsibility for a given subject ID.
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addResponsibility(array $data): string
    {
        $uri = 'projects/responsibilities';
        $required = [
            'subjectId' => self::TYPE_STRING,
            'summary' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * Edit an existing responsibility.
     *
     * @param string $responsibilityId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateResponsibility(string $responsibilityId, array $data): void
    {
        $uri = 'projects/responsibilities/{responsibilityId}';
        $required = [
            'summary' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'responsibilityId' => $responsibilityId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing responsibility.
     *
     * @param string $responsibilityId
     * @return void
     * @throws GuzzleException
     */
    public function deleteResponsibility(string $responsibilityId): void
    {
        $uri = 'projects/responsibilities/{responsibilityId}';
        $uriArguments = [
            'responsibilityId' => $responsibilityId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Assignees
     */
    public function assignees(): Assignees
    {
        return new Assignees($this->client);
    }

    /**
     * @return Scheme
     */
    public function scheme(): Scheme
    {
        return new Scheme($this->client);
    }

    /**
     * @return Subjects
     */
    public function subjects(): Subjects
    {
        return new Subjects($this->client);
    }
}