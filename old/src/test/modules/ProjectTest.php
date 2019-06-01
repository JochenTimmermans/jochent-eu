<?php

use PHPUnit\Framework\TestCase;

use jochen\projects\Project;

/**
 * @covers Project
 */
final class ProjectTest extends TestCase
{
    public function providerProjectId() 
    {
        return array(
            array(1),
            array(2)
        );
    }
    public function providerProjectIdTitle()
    {
        return array(
            array(1,'The Oracle'),
            array(2,'Hangman'),
            array(3,'Tegenstrijd')
        );        
    }
    public function providerProjectIdDescription()
    {
        return array(
            array(1,'An Oracle Site'),
            array(2,'A Hangman game for 1 or 2 players'),
            array(3,'A dutch political site for bundling contradictions of politicians')
        );
    }
    public function providerProjectIdImgurl()
    {
        return array(
            array(1,'oracle.png'),
            array(2,'hangman.png'),
            array(3,'tegenstrijd.png')
        );
    }
    public function providerProjectIdProjecturl() 
    {
        return array(
            array(1,'http://theoracleanswers.com'),
            array(2,'https://hangman.islandshore.net'),
            array(3,'https://tegenstrijd.nu')
        );
    }
    public function providerProjectIdCreated() 
    {        
        return array(
            array(1,'2017-11-10 08:20:31'),
            array(2,'2017-11-10 08:20:31'),
            array(3,'2017-11-10 08:20:31')
        );
    }
    public function providerProjectIdImgurlFull()
    {
        return array(
            array(1,WWW.'images/projects/oracle.png'),
            array(2,WWW.'images/projects/hangman.png'),
            array(3,WWW.'images/projects/tegenstrijd.png')
        );
    }
    /**
     * @param type $project_id
     * @dataProvider providerProjectId
     */
    public function testNewProject($project_id) 
    {
        $project = new Project($project_id);
        $this->assertInstanceOf(Project::class, $project);
    }
    /**
     * @param type $project_id
     * @dataProvider providerProjectId
     */
    public function testProjectId($project_id) 
    {
        $project = new Project($project_id);
        $this->assertEquals($project_id, $project->id());
    }
    /**
     * @param type $project_id
     * @dataProvider providerProjectIdTitle
     */
    public function testProjectTitle($project_id,$project_title)
    {
        $project = new Project($project_id);
        $this->assertEquals($project_title, $project->title());
    }
    /**
     * @param type $project_id
     * @dataProvider providerProjectIdDescription
     */
    public function testProjectDescription($project_id,$project_description)
    {
        $project = new Project($project_id);
        $this->assertEquals($project_description, $project->description());
    }
    /**
     * @param type $project_id
     * @dataProvider providerProjectIdImgurl
     */
    public function testProjectImgurl($project_id,$project_imgurl)
    {
        $project = new Project($project_id);
        $this->assertEquals($project_imgurl, $project->imgurl());
    }    
    /**
     * @param type $project_id
     * @dataProvider providerProjectIdProjecturl
     */
    public function testProjectProjecturl($project_id,$project_projecturl)
    {
        $project = new Project($project_id);
        $this->assertEquals($project_projecturl, $project->projecturl());
    }    
    /**
     * @param type $project_id
     * @dataProvider providerProjectIdCreated
     */
    public function testProjectCreated($project_id,$project_created)
    {
        $project = new Project($project_id);
        $this->assertEquals($project_created, $project->created());
    }        
    /**
     * @param type $project_id
     * @dataProvider providerProjectIdImgurlFull
     */
    public function testProjectImgurlFull($project_id,$project_imgurlFull)
    {
        $project = new Project($project_id);
        $this->assertEquals($project_imgurlFull, $project->imgurlFull());
    }    
}