<?php

namespace Swe\SpaceSDK\Tests\Project;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Project;
use Swe\SpaceSDK\Project\Repository;
use Swe\SpaceSDK\Tests\ProjectTest;
use Swe\SpaceSDK\Tests\SpaceTestCase;

/**
 * Class RepositoryTest
 *
 * @package Swe\SpaceSDK\Tests\Project
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class RepositoryTest extends SpaceTestCase
{
    const JB_GIT_DOMAIN = 'https://git.jetbrains.space';

    /**
     * @var string
     */
    public static string $repositoryName = 'my-test-repository';

    /**
     * @var string
     */
    public static string $repositoryBranch = 'test';

    /**
     * @var string
     */
    public static string $gitUrl;

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
        static::$gitUrl = sprintf('%s/%s/', self::JB_GIT_DOMAIN, static::$instanceName);
        static::$project = static::$space->project();
        static::$repository = static::$project->repository();
        $projectData = [
            'key' => [
                'key' => ProjectTest::$projectKey,
            ],
            'name' => ProjectTest::$projectName,
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
            'key' => ProjectTest::$projectKey,
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
            'key' => ProjectTest::$projectKey,
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
            'key' => ProjectTest::$projectKey,
            'repository' => $repository['name'],
        ];
        $response = static::$repository->getRepositoryGitRemoteUrl($request);
        $httpUrl = static::$gitUrl.strtolower(ProjectTest::$projectKey).'/'.$repository['name'].'.git';
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
            'key' => ProjectTest::$projectKey,
            'repository' => $repository['name'],
        ];
        $response = static::$repository->deleteRepository($request);

        $this->assertTrue($response);
    }
}
