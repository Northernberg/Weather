<?php

namespace Anax\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class WeatherControllerTest extends TestCase
{
    /**
     * Properties
     */
    protected $di;
    protected $controller;



    /**
     * Set up a request object
     *
     * @return void
     */
    public function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new WeatherController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }
    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $res = $this->controller->indexAction();
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }

    /**
     * Test the route "index".
     */
    public function testIndexActionPost()
    {
        // Test ip without weather condition
        $this->controller->indexActionPost();
        // $this->di->get("request")->setPost("location", "255.255.255.255");
        $location = $this->di->get("request")->getPost("location");
        $this->assertEquals($location, null);

        // $this->assertInstanceOf("\Anax\Response\Response", $res);
    }

    /**
     * Test the route "index".
     */
    public function testWrongIndexActionPost()
    {
        // $this->di->get("request")->setPost("location", "hey");
        $this->controller->indexActionPost();
        $location = $this->di->get("request")->getPost("location");
        $this->assertEquals($location, null);

        // $this->assertInstanceOf("\Anax\Response\Response", $res);
    }

    /**
     * Test the route "index".
     */
    public function testWrongApiPost()
    {
        $res = $this->controller->apiActionGet("hey");

        $this->assertArrayHasKey("Error", $res[0]);
    }
}
