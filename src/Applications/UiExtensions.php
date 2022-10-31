<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class UiExtensions
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class UiExtensions extends AbstractApi
{
    /**
     * Get UI extensions supported by the application in specified context. Omit contextIdentifier to get UI extensions in all contexts
     *
     * Permissions that may be checked: Applications.View
     *
     * @param array $application
     * @param array $request
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getUiExtensions(array $application, array $request, array $response = []): ?array
    {
        $uri = 'applications/{application}/ui-extensions';
        $required = [
            'contextIdentifier' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Disable application UI for everybody in specified context. Requires Superadmin right for global context, AdminProject for project context, AdminChannel for channel context. Users will still be able to enable application UI individually.
     *
     * Permissions that may be checked: Applications.View, Superadmin, Project.Admin, Channel.Admin
     *
     * @param array $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function disableApplicationUi(array $application, array $data): void
    {
        $uri = 'applications/{application}/ui-extensions/disable-for-everybody';
        $required = [
            'contextIdentifier' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Disable application UI in specified context for the current user
     *
     * Permissions that may be checked: Applications.View
     *
     * @param array $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function disableApplicationUiForMe(array $application, array $data): void
    {
        $uri = 'applications/{application}/ui-extensions/disable-for-me';
        $required = [
            'contextIdentifier' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Enable application UI for everybody in specified context. Requires Superadmin right for global context, AdminProject for project context, AdminChannel for channel context. Users will still be able to disable application UI individually.
     *
     * Permissions that may be checked: Applications.View, Superadmin, Project.Admin, Channel.Admin
     *
     * @param array $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function enableApplicationUi(array $application, array $data): void
    {
        $uri = 'applications/{application}/ui-extensions/enable-for-everybody';
        $required = [
            'contextIdentifier' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Enable application UI in specified context for the current user
     *
     * Permissions that may be checked: Applications.View
     *
     * @param array $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function enableApplicationUiForMe(array $application, array $data): void
    {
        $uri = 'applications/{application}/ui-extensions/enable-for-me';
        $required = [
            'contextIdentifier' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
