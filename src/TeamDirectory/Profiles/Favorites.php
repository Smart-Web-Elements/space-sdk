<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Favorites
 * Generated at 2023-10-06 07:26
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Favorites extends AbstractApi
{
    /**
     * Add an entity with the given `id` and of the given `kind` to favorites. For profiles this operation is called “follow” in the user interface.
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addFavorite(array $data): void
    {
        $uri = 'team-directory/profiles/favorites';
        $required = [
            'id' => Type::String,
            'kind' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * IDs of favorite deployment targets
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFavoriteDeploymentTargets(array $response = []): array
    {
        $uri = 'team-directory/profiles/favorites/deployment-targets';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * IDs of favorite documents
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFavoriteDocuments(array $response = []): array
    {
        $uri = 'team-directory/profiles/favorites/documents';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * IDs of favorite jobs
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFavoriteJobs(array $response = []): array
    {
        $uri = 'team-directory/profiles/favorites/jobs';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Favorite locations
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFavoriteLocations(array $response = []): array
    {
        $uri = 'team-directory/profiles/favorites/locations';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Followed profiles
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFollowedProfiles(array $response = []): array
    {
        $uri = 'team-directory/profiles/favorites/profiles';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Favorite projects
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFavoriteProjects(array $response = []): array
    {
        $uri = 'team-directory/profiles/favorites/projects';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * IDs of favorite code repositories
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFavoriteRepositories(array $response = []): array
    {
        $uri = 'team-directory/profiles/favorites/repositories';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Favorite teams
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFavoriteTeams(array $response = []): array
    {
        $uri = 'team-directory/profiles/favorites/teams';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Remove an entity with the given `id` and of the given `kind` from favorites. For profiles this operation is called “unfollow” in the user interface.
     *
     * @param string $id
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeFavorite(string $id, array $request): void
    {
        $uri = 'team-directory/profiles/favorites/{id}';
        $required = [
            'kind' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
