<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Profiles\Checklists\FullChecklistTree;

/**
 * Class Checklists
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Checklists extends AbstractApi
{
    /**
     * Tab indented lines are converted into checkable items following the same rules as in Import Checklist. The result
     * is placed inside of the specified personal checklist.
     *
     * @param string $profile
     * @param string $checklistId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function importChecklistLines(string $profile, string $checklistId, array $data): void
    {
        $uri = 'team-directory/profiles/{profile}/checklists/{checklistId}/import';
        $required = [
            'targetParentId' => self::TYPE_STRING,
            'tabIndentedLines' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
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