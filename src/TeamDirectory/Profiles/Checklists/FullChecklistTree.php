<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Checklists;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class FullChecklistTree
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Checklists
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class FullChecklistTree extends AbstractApi
{
    /**
     * Get the content of a checklist associated with the profile
     *
     * @param array $profile
     * @param string $checklistId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFullChecklistTree(array $profile, string $checklistId, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/checklists/{checklistId}/full-checklist-tree';
        $uriArguments = [
            'profile' => $profile,
            'checklistId' => $checklistId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
