<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class WidgetSettings
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class WidgetSettings extends AbstractApi
{
    /**
     * @param string $widget
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getWidgetSetting(string $widget, array $response = []): ?array
    {
        $uri = 'team-directory/profiles/widget-settings/{widget}';
        $uriArguments = [
            'widget' => $widget,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $widget
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateWidgetSetting(string $widget, array $data): void
    {
        $uri = 'team-directory/profiles/widget-settings/{widget}';
        $required = [
            'settings' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'widget' => $widget,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
