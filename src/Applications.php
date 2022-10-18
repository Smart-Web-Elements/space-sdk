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
class Applications extends AbstractApi
{
    /**
     * Permissions that may be checked: Applications.Create
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function createApplication(array $data, array $response = []): array
    {
        $uri = 'applications';
        $required = [
            'name' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    public function restoreApplication(string $application): void
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
    public function getAllApplications(array $request = [], array $response = []): array
    {
        $uri = 'applications/paged';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getApplication(string $application, array $response = []): array
    {
        $uri = 'applications/{application}';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param string $application
     * @return string|null
     * @throws GuzzleException
     */
    public function bearerToken(string $application): ?string
    {
        $uri = 'applications/{application}/bearer-token';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }

    /**
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getLastClientCredentialsAccessInfo(string $application, array $response = []): array
    {
        $uri = 'applications/{application}/last-client-credentials-access';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Returns list of public keys in JWKS format. If message signature is successfully verified with any of the
     * returned public keys, the message can be considered authentic.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @return string
     * @throws GuzzleException
     */
    public function publicKeys(string $application): string
    {
        $uri = 'applications/{application}/public-keys';
        $uriArguments = [
            'application' => $application,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }

    /**
     * Set UI extensions supported by the calling application in specified context. Only the application itself can set
     * its extensions.
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function setUIExtensions(array $data): void
    {
        $uri = 'applications/ui-extensions';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
            'extensions' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }

    /**
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updateApplication(string $application, array $data = [], array $response = []): array
    {
        $uri = 'applications/{application}';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Permissions that may be checked: Applications.Delete
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    public function deleteApplication(string $application): void
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
    public function authorizations(): Authorizations
    {
        return new Authorizations($this->client);
    }

    /**
     * @return ClientSecret
     */
    public function clientSecret(): ClientSecret
    {
        return new ClientSecret($this->client);
    }

    /**
     * @return PermanentTokens
     */
    public function permanentTokens(): PermanentTokens
    {
        return new PermanentTokens($this->client);
    }

    /**
     * @return SigningKey
     */
    public function signingKey(): SigningKey
    {
        return new SigningKey($this->client);
    }

    /**
     * @return SshKeys
     */
    public function sshKeys(): SshKeys
    {
        return new SshKeys($this->client);
    }

    /**
     * @return UiExtensions
     */
    public function uiExtensions(): UiExtensions
    {
        return new UiExtensions($this->client);
    }

    /**
     * @return UnfurlDomains
     */
    public function unfurlDomains(): UnfurlDomains
    {
        return new UnfurlDomains($this->client);
    }

    /**
     * @return UnfurlPatterns
     */
    public function unfurlPatterns(): UnfurlPatterns
    {
        return new UnfurlPatterns($this->client);
    }

    /**
     * @return Unfurls
     */
    public function unfurls(): Unfurls
    {
        return new Unfurls($this->client);
    }

    /**
     * @return VerificationToken
     */
    public function verificationToken(): VerificationToken
    {
        return new VerificationToken($this->client);
    }

    /**
     * @return Webhooks
     */
    public function webhooks(): Webhooks
    {
        return new Webhooks($this->client);
    }
}