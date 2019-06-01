<?php

use PHPUnit\Framework\TestCase;

use jochen\mvc\model\ProjectModel;

/**
 * @covers Project
 */
final class ProjectModelTest extends TestCase
{
    public function providerProjectId()
    {
        return array(
            array(1, true),
            array(2, true),
            array(400, false)
        );
    }
    /**
     * @param type $pid
     * @param type $result
     * @dataProvider providerProjectId
     */
    public function testProjectModel_isValidProjectId($pid, $result)
    {
        $this->assertEquals($result, ProjectModel::isValidProjectId($pid));
    }

    
    public function testProjectModel_projects_limit()
    {
        $this->assertCount(1, ProjectModel::projects(1));
        $this->assertCount(2, ProjectModel::projects(2));
    }

    public function testProjectModel_projects_isArray()
    {
        $this->assertInternalType('array', ProjectModel::projects());
        
    }
}