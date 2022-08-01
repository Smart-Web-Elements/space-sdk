<?php

namespace Swe\SpaceSDK\Tests;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Project;
use Swe\SpaceSDK\Project\Automation;
use Swe\SpaceSDK\Project\Repository;

/**
 * Class ProjectTest
 *
 * @package Space\Test
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ProjectTest extends SpaceTestCase
{
    /**
     * @var string
     */
    public static string $projectKey = 'PROJECT_TEST';

    /**
     * @var string
     */
    public static string $projectName = 'Project Test';

    /**
     * @var string
     */
    public static string $projectNameUpdated = 'Project Test Updated';

    /**
     * @var Project
     */
    protected static Project $project;

    /**
     * @throws GuzzleException
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::$project = static::$space->project();
    }

    /**
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testCreateProject()
    {
        $data = [
            'key' => [
                'key' => static::$projectKey,
            ],
            'name' => static::$projectName,
        ];
        $response = static::$project->createProject($data);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
        $this->assertSame(static::$projectName, $response['name']);
    }

    /**
     * @depends testCreateProject
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testGetProject()
    {
        $request = [
            'key' => static::$projectKey,
        ];
        $response = static::$project->getProject($request);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
        $this->assertSame(static::$projectName, $response['name']);
    }

    /**
     * @depends testGetProject
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testUpdateProject()
    {
        $request = [
            'key' => static::$projectKey,
        ];
        $project = static::$project->getProject($request);

        $request = [
            'id' => $project['id'],
        ];
        $data = [
            'name' => static::$projectNameUpdated,
        ];
        $response = static::$project->updateProject($request, $data);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('name', $response);
        $this->assertSame(static::$projectNameUpdated, $response['name']);
    }

    /**
     * @depends testUpdateProject
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testRemoveProject()
    {
        $request = [
            'key' => static::$projectKey,
        ];
        $project = static::$project->getProject($request);

        $request = [
            'id' => $project['id'],
        ];
        $response = static::$project->deleteProject($request);

        $this->assertTrue($response);
    }

    /**
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testCreateInvalidProject()
    {
        $projectData = [
            'key' => static::$projectKey,
            'name' => static::$projectName,
        ];
        $this->expectException(MissingArgumentException::class);
        static::$project->createProject($projectData);
    }

    /**
     * @throws GuzzleException
     */
    public function testGetAllProjects()
    {
        $this->assertIsArray(static::$project->getAllProjects());
    }

    /**
     * @throws GuzzleException
     */
    public function testGetAllProjectsWithInvalidRequestKey()
    {
        $result = static::$project->getAllProjects(['$top' => 'invalid']);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }

    /**
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testGetProjectNotExisting()
    {
        $this->expectException(GuzzleException::class);
        static::$project->getProject(['key' => 'NOT_EXISTING']);
    }

    /**
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testGetProjectWithoutInformation()
    {
        $this->expectException(MissingArgumentException::class);
        static::$project->getProject([]);
    }

    /**
     *
     */
    public function testRepository(): void
    {
        $this->assertInstanceOf(Repository::class, static::$project->repository());
    }

    /**
     *
     */
    public function testAutomation(): void
    {
        $this->assertInstanceOf(Automation::class, static::$project->automation());
    }
}
