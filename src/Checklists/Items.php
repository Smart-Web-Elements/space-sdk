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
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createPlanItem(array $data, array $response): array
    {
        $uri = 'checklists/{checklist}/items';
        $required = [
            'checklist' => self::TYPE_STRING,
            'itemText' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'checklist' => $data['checklist'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Move plan item in a checklist.
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function movePlanItem(array $data, array $response): array
    {
        $uri = 'checklists/{checklist}/items/{planItem}/move';
        $required = [
            'checklist' => self::TYPE_STRING,
            'planItem' => self::TYPE_STRING,
            'targetParent' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'checklist' => $data['checklist'],
            'planItem' => $data['planItem'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Get plan item by its identifier in a checklist.
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getPlanItem(array $data, array $response): array
    {
        $uri = 'checklists/{checklist}/items/{planItem}';
        $required = [
            'checklist' => self::TYPE_STRING,
            'planItem' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'checklist' => $data['checklist'],
            'planItem' => $data['planItem'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Update plan item in a checklist.
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updatePlanItem(array $data, array $response): array
    {
        $uri = 'checklists/{checklist}/items/{planItem}';
        $required = [
            'checklist' => self::TYPE_STRING,
            'planItem' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'checklist' => $data['checklist'],
            'planItem' => $data['planItem'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Delete plan item and its children from a checklist.
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function deletePlanItem(array $data): void
    {
        $uri = 'checklists/{checklist}/items/{planItem}';
        $required = [
            'checklist' => self::TYPE_STRING,
            'planItem' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'checklist' => $data['checklist'],
            'planItem' => $data['planItem'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}