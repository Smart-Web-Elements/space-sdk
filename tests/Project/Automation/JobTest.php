<?php

namespace Swe\SpaceSDK\Tests\Project\Automation;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Project;
use Swe\SpaceSDK\Project\Automation\Jobs;
use Swe\SpaceSDK\Project\Repositories;
use Swe\SpaceSDK\Tests\Project\RepositoryTest;
use Swe\SpaceSDK\Tests\ProjectTest;
use Swe\SpaceSDK\Tests\SpaceTestCase;

/**
 * Class JobTest
 *
 * @package Swe\SpaceSDK\Tests\Project\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class JobTest extends SpaceTestCase
{
    /**
     * @var Jobs
     */
    protected static Jobs $job;

    /**
     * @var Repositories
     */
    protected static Repositories $repository;

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
        static::$project = static::$space->project();
        static::$job = static::$project->automation()->jobs();
        static::$repository = static::$project->repositories();
        $projectData = [
            'key' => [
                'key' => ProjectTest::$projectKey,
            ],
            'name' => ProjectTest::$projectName,
        ];
        static::$project->createProject($projectData);
        $repositoryData = [
            'key' => ProjectTest::$projectKey,
            'repository' => RepositoryTest::$repositoryName,
            'branch' => RepositoryTest::$repositoryBranch,
        ];
        static::$repository->createNewRepository($repositoryData);
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
        $repositoryData = [
            'key' => ProjectTest::$projectKey,
            'repository' => RepositoryTest::$repositoryName,
        ];
        static::$repository->deleteRepository($repositoryData);
        static::$project->deleteProject($projectData);
        parent::tearDownAfterClass();
    }

    /**
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function testGetAllJobs()
    {
        $request = [
            'key' => ProjectTest::$projectKey,
            'repoFilter' => RepositoryTest::$repositoryName,
            'branchFilter' => RepositoryTest::$repositoryBranch,
        ];

        try {
            $response = static::$job->getAllJobs($request);
        } catch (ClientException $e) {
            $this->assertEquals(403, $e->getResponse()->getStatusCode());
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
            $this->assertEquals(static::$permissionMissingError, $response['error']);
            $this->permissionMismatch();
        }

        $this->assertIsArray($response);
        $this->assertEmpty($response['data']);
    }
}
