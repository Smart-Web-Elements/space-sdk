<?php

namespace Swe\SpaceSDK\Tests;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Project;
use Swe\SpaceSDK\Project\Repository;

/**
 * Class ProjectTest
 *
 * @package Space\Test
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ProjectTest extends ClientTestCase
{
    /**
     * @var string
     */
    protected static string $projectKey = 'PROJECT_TEST';

    /**
     * @var string
     */
    protected static string $projectName = 'Project Test';

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
        static::$project = new Project(static::$client);
    }

    /**
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testCreateProject(): array
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
        $this->assertSame($data['name'], $response['name']);

        return $response;
    }

    /**
     * @depends testCreateProject
     * @param array $project
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testGetProject(array $project): array
    {
        $request = [
            'key' => $project['key']['key'],
        ];
        $response = static::$project->getProject($request);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
        $this->assertSame($project['name'], $response['name']);

        return $response;
    }

    /**
     * @depends testGetProject
     * @param array $project
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testUpdateProject(array $project): array
    {
        $request = [
            'id' => $project['id'],
        ];
        $data = [
            'name' => 'Test Updated',
        ];
        $response = static::$project->updateProject($request, $data);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('name', $response);
        $this->assertSame($data['name'], $response['name']);

        return $response;
    }

    /**
     * @depends testUpdateProject
     * @param array $project
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testRemoveProject(array $project)
    {
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
}
