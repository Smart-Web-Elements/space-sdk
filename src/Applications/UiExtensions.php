<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class UiExtensions
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class UiExtensions extends AbstractApi
{
    /**
     * Get UI extensions supported by the application in specified context. Omit contextIdentifier to get UI extensions
     * in all contexts.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getUiExtensions(string $application, array $data, array $response = []): array
    {
        $uri = 'applications/{application}/ui-extensions';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Disable application UI for everybody in specified context. Requires Superadmin right for global context,
     * AdminProject for project context, AdminChannel for channel context. Users will still be able to enable
     * application UI individually.
     *
     * Permissions that may be checked: Applications.View, Superadmin, Projects.Admin, Channel.Admin
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function disableApplicationUi(string $application, array $data): void
    {
        $uri = 'applications/{application}/ui-extensions/disable-for-everybody';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Disable application UI in specified context for the current user.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function disableApplicationUiForMe(string $application, array $data): void
    {
        $uri = 'applications/{application}/ui-extensions/disable-for-me';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Enable application UI for everybody in specified context. Requires Superadmin right for global context,
     * AdminProject for project context, AdminChannel for channel context. Users will still be able to disable
     * application UI individually.
     *
     * Permissions that may be checked: Applications.View, Superadmin, Projects.Admin, Channel.Admin
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function enableApplicationUi(string $application, array $data): void
    {
        $uri = 'applications/{application}/ui-extensions/enable-for-everybody';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Enable application UI in specified context for the current user.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function enableApplicationUiForMe(string $application, array $data): void
    {
        $uri = 'applications/{application}/ui-extensions/enable-for-me';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}