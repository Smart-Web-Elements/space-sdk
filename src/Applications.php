<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Applications\Authorizations;
use Swe\SpaceSDK\Applications\ClientSecret;
use Swe\SpaceSDK\Applications\GpgKeys;
use Swe\SpaceSDK\Applications\Parameters;
use Swe\SpaceSDK\Applications\PermanentTokens;
use Swe\SpaceSDK\Applications\SigningKey;
use Swe\SpaceSDK\Applications\SshKeys;
use Swe\SpaceSDK\Applications\UiExtensions;
use Swe\SpaceSDK\Applications\UnfurlDomains;
use Swe\SpaceSDK\Applications\UnfurlPatterns;
use Swe\SpaceSDK\Applications\Unfurls;
use Swe\SpaceSDK\Applications\VerificationToken;
use Swe\SpaceSDK\Applications\Webhooks;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Applications
 * Generated at 2023-10-24 02:15
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Applications extends AbstractApi
{
    /**
     * Creates a new application. Marketplace application cannot be installed using this endpoint.
     *
     * To create a multi-org application (and connect application server to the current Space instance), pass `connectToSpace = true`. Learn more about multi-org applications in the [documentation](https://www.jetbrains.com/help/space/distribute-your-application.html).
     *
     * Permissions that may be checked: Applications.Create
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createApplication(array $data, array $response = []): array
    {
        $uri = 'applications';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Provide error message to display on application page in Space UI. Provide `null` message to remove it.
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function setErrorMessage(array $data = []): void
    {
        $uri = 'applications/error-message';

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Application may periodically call this api method to notify Space that it is functioning properly. This is mandatory for applications that connect external issue trackers.
     *
     * @return void
     * @throws GuzzleException
     */
    final public function reportApplicationAsHealthy(): void
    {
        $uri = 'applications/report-application-as-healthy';

        $this->client->post($this->buildUrl($uri));
    }

    /**
     * Removes the application that has previously failed to respond with code 200 to `ApplicationUninstalledPayload` request, without sending additional `ApplicationUninstalledPayload` requests. The application is archived and its access terminated.
     *
     * Permissions that may be checked: Applications.Delete
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    final public function forceRemoveApplication(string $application): void
    {
        $uri = 'applications/{application}/force-remove';
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    final public function restoreApplication(string $application): void
    {
        $uri = 'applications/{application}/restore';
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Permissions that may be checked: Applications.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllApplications(array $request = [], array $response = []): array
    {
        $uri = 'applications/paged';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getApplication(string $application, array $response = []): array
    {
        $uri = 'applications/{application}';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param string $application
     * @return string|null
     * @throws GuzzleException
     */
    final public function bearerToken(string $application): ?string
    {
        $uri = 'applications/{application}/bearer-token';
        $uriArguments = [
            'application' => $application,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }

    /**
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getLastClientCredentialsAccessInfo(string $application, array $response = []): ?array
    {
        $uri = 'applications/{application}/last-client-credentials-access';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Returns list of public keys in JWKS format. If message signature is successfully verified with any of the returned public keys, the message can be considered authentic.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @return string
     * @throws GuzzleException
     */
    final public function publicKeys(string $application): string
    {
        $uri = 'applications/{application}/public-keys';
        $uriArguments = [
            'application' => $application,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }

    /**
     * Set UI extensions supported by the calling application in specified context. Only the application itself can set its extensions.
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setUiExtensions(array $data): void
    {
        $uri = 'applications/ui-extensions';
        $required = [
            'contextIdentifier' => Type::String,
            'extensions' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }

    /**
     * Update existing application. Multi-org applications (created with the parameter `connectToSpace = true` or installed from JetBrains Marketplace) can only be updated by the application itself. Learn more about multi-org applications in the [documentation](https://www.jetbrains.com/help/space/distribute-your-application.html).
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateApplication(string $application, array $data = [], array $response = []): array
    {
        $uri = 'applications/{application}';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Removes specified application. If the application is connected (installed from Marketplace or through an install link), Space sends `ApplicationUninstalledPayload` to the application's server. The application is only actually deleted when the application server responds or when the `ApplicationUninstalledPayload` request times out multiple times.
     *
     * This API method does not wait until the `ApplicationUninstalledPayload` request is finished and instead returns immediately. Consequently, the application may still be active right after this API method call.
     *
     * If sending `ApplicationUninstalledPayload` has failed at least one time, a user may choose to force-remove the application. In this case the access for the application is terminated and it can no longer make requests.
     *
     * Permissions that may be checked: Applications.Delete
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    final public function deleteApplication(string $application): void
    {
        $uri = 'applications/{application}';
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Authorizations
     */
    final public function authorizations(): Authorizations
    {
        return new Authorizations($this->client);
    }

    /**
     * @return Parameters
     */
    final public function parameters(): Parameters
    {
        return new Parameters($this->client);
    }

    /**
     * @return Unfurls
     */
    final public function unfurls(): Unfurls
    {
        return new Unfurls($this->client);
    }

    /**
     * @return ClientSecret
     */
    final public function clientSecret(): ClientSecret
    {
        return new ClientSecret($this->client);
    }

    /**
     * @return GpgKeys
     */
    final public function gpgKeys(): GpgKeys
    {
        return new GpgKeys($this->client);
    }

    /**
     * @return PermanentTokens
     */
    final public function permanentTokens(): PermanentTokens
    {
        return new PermanentTokens($this->client);
    }

    /**
     * @return SigningKey
     */
    final public function signingKey(): SigningKey
    {
        return new SigningKey($this->client);
    }

    /**
     * @return SshKeys
     */
    final public function sshKeys(): SshKeys
    {
        return new SshKeys($this->client);
    }

    /**
     * @return UiExtensions
     */
    final public function uiExtensions(): UiExtensions
    {
        return new UiExtensions($this->client);
    }

    /**
     * @return UnfurlDomains
     */
    final public function unfurlDomains(): UnfurlDomains
    {
        return new UnfurlDomains($this->client);
    }

    /**
     * @return UnfurlPatterns
     */
    final public function unfurlPatterns(): UnfurlPatterns
    {
        return new UnfurlPatterns($this->client);
    }

    /**
     * @return VerificationToken
     */
    final public function verificationToken(): VerificationToken
    {
        return new VerificationToken($this->client);
    }

    /**
     * @return Webhooks
     */
    final public function webhooks(): Webhooks
    {
        return new Webhooks($this->client);
    }
}
