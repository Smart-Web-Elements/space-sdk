<?php

namespace Swe\SpaceSDK\Projects\Planning;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Planning\Checklists\FullChecklistTree;

/**
 * Class Checklists
 *
 * @package Swe\SpaceSDK\Projects\Planning
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Checklists extends AbstractApi
{
    /**
     * Tab indented lines are converted into checkable items following the same rules as in Import Checklist. The result
     * is placed inside of the specified project checklist.
     *
     * @param string $project
     * @param string $checklistId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function importChecklistLines(string $project, string $checklistId, array $data): void
    {
        $uri = 'projects/{project}/planning/checklists/{checklistId}/import';
        $required = [
            'targetParentId' => self::TYPE_STRING,
            'tabIndentedLines' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'checklistId' => $checklistId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @return FullChecklistTree
     */
    public function fullChecklistTree(): FullChecklistTree
    {
        return new FullChecklistTree($this->client);
    }
}