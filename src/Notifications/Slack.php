<?php

namespace Swe\SpaceSDK\Notifications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Slack
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Notifications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Slack extends AbstractApi
{
    /**
     * Install Slack incoming webhook URL to Space for posting notifications
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function installIncomingWebhook(array $data): void
    {
        $uri = 'notifications/slack/install-incoming-webhook';
        $required = [
            'slackChannel' => Type::String,
            'webhookUrl' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }
}
