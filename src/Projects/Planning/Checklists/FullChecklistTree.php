<?php

namespace Swe\SpaceSDK\Projects\Planning\Checklists;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class FullChecklistTree
 *
 * @package Swe\SpaceSDK\Projects\Planning\Checklists
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class FullChecklistTree extends AbstractApi
{
    /**
     * Get the content of a checklist in a project
     *
     * @param array $project
     * @param string $checklistId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFullChecklistTree(array $project, string $checklistId, array $response = []): array
    {
        $uri = 'projects/{project}/planning/checklists/{checklistId}/full-checklist-tree';
        $uriArguments = [
            'project' => $project,
            'checklistId' => $checklistId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
