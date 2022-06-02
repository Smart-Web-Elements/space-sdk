<?php

namespace Swe\SpaceSDK\Tests\Project;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Project;
use Swe\SpaceSDK\Project\Repository;
use Swe\SpaceSDK\Tests\ClientTestCase;

/**
 * Class RepositoryTest
 *
 * @package Swe\SpaceSDK\Tests\Project
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class RepositoryTest extends ClientTestCase
{
    /**
     * @var string
     */
    protected static string $projectKey = 'REPOSITORY_TEST';

    /**
     * @var string
     */
    protected static string $projectName = 'Repository Test';

    /**
     * @var string
     */
    protected static string $repositoryName = 'my-test-repository';

    /**
     * @var string
     */
    protected static string $repositoryBranch = 'test';

    /**
     * @var Repository
     */
    protected static Repository $repository;

    /**
     * @var Project
     */
    protected static Project $project;

    /**
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::$project = new Project(static::$client);
        static::$repository = new Repository(static::$client);
        $projectData = [
            'key' => [
                'key' => static::$projectKey,
            ],
            'name' => static::$projectName,
        ];
        static::$project->createProject($projectData);
    }

    /**
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public static function tearDownAfterClass(): void
    {
        $projectData = [
            'key' => static::$projectKey,
        ];
        static::$project->deleteProject($projectData);
        parent::tearDownAfterClass();
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testCreateRepository(): array
    {
        $data = [
            'key' => static::$projectKey,
            'repository' => static::$repositoryName,
            'defaultBranch' => static::$repositoryBranch,
        ];
        $response = static::$repository->createRepository($data);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
        $this->assertSame($data['repository'], $response['name']);

        return $response;
    }

    /**
     * @depends testCreateRepository
     * @param array $repository
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testGetRepositoryGitRemoteUrl(array $repository): array
    {
        $request = [
            'key' => static::$projectKey,
            'repository' => $repository['name'],
        ];
        $response = static::$repository->getRepositoryGitRemoteUrl($request);
        $httpUrl = 'https://git.jetbrains.space/swe/'.strtolower(static::$projectKey).'/'.$repository['name'].'.git';
        $this->assertIsArray($response);
        $this->assertArrayHasKey('httpUrl', $response);
        $this->assertSame($httpUrl, $response['httpUrl']);

        return $repository;
    }

    /**
     * @depends testGetRepositoryGitRemoteUrl
     * @param array $repository
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testDeleteRepository(array $repository)
    {
        $request = [
            'key' => static::$projectKey,
            'repository' => $repository['name'],
        ];
        $response = static::$repository->deleteRepository($request);

        $this->assertTrue($response);
    }
}
