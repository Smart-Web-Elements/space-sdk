<?php

namespace Swe\SpaceSDK\Checklists;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Items
 *
 * @package Swe\SpaceSDK\Checklists
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Items extends AbstractApi
{
    /**
     * Create plan item as the last element of the top level in a checklist if parent plan item is null, or as the last
     * child if parent plan item is provided.
     *
     * @param string $checklist
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createPlanItem(string $checklist, array $data, array $response = []): array
    {
        $uri = 'checklists/{checklist}/items';
        $required = [
            'itemText' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'checklist' => $checklist,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Move plan item in a checklist.
     *
     * @param string $checklist
     * @param string $planItem
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function movePlanItem(string $checklist, string $planItem, array $data, array $response = []): array
    {
        $uri = 'checklists/{checklist}/items/{planItem}/move';
        $required = [
            'targetParent' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'checklist' => $checklist,
            'planItem' => $planItem,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Get plan item by its identifier in a checklist.
     *
     * @param string $checklist
     * @param string $planItem
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getPlanItem(string $checklist, string $planItem, array $response = []): array
    {
        $uri = 'checklists/{checklist}/items/{planItem}';
        $uriArguments = [
            'checklist' => $checklist,
            'planItem' => $planItem,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Update plan item in a checklist.
     *
     * @param string $checklist
     * @param string $planItem
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updatePlanItem(string $checklist, string $planItem, array $data = [], array $response = []): array
    {
        $uri = 'checklists/{checklist}/items/{planItem}';
        $uriArguments = [
            'checklist' => $checklist,
            'planItem' => $planItem,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Delete plan item and its children from a checklist.
     *
     * @param string $checklist
     * @param string $planItem
     * @return void
     * @throws GuzzleException
     */
    public function deletePlanItem(string $checklist, string $planItem): void
    {
        $uri = 'checklists/{checklist}/items/{planItem}';
        $uriArguments = [
            'checklist' => $checklist,
            'planItem' => $planItem,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}