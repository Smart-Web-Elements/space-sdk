<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Applications\Authorizations;
use Swe\SpaceSDK\Applications\ClientSecret;
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
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Applications extends AbstractApi
{
    /**
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
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $application
     * @return void
     * @throws GuzzleException
     */
    final public function restoreApplication(array $application): void
    {
        $uri = 'applications/{application}/restore';
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
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
     * @param array $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getApplication(array $application, array $response = []): array
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
     * @param array $application
     * @param array $response
     * @return string|null
     * @throws GuzzleException
     */
    final public function bearerToken(array $application): ?string
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
     * @param array $application
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getLastClientCredentialsAccessInfo(array $application, array $response = []): ?array
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
     * @param array $application
     * @param array $response
     * @return string
     * @throws GuzzleException
     */
    final public function publicKeys(array $application): string
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
            'contextIdentifier' => Type::Array,
            'extensions' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }

    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $application
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateApplication(array $application, array $data = [], array $response = []): array
    {
        $uri = 'applications/{application}';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Applications.Delete
     *
     * @param array $application
     * @return void
     * @throws GuzzleException
     */
    final public function deleteApplication(array $application): void
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
