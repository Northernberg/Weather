<?php

namespace Anax\Models;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class CurlWrapTest extends TestCase
{
    protected $curl;

    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        // Setup the curlwrap
        $this->curl = new CurlWrap();
    }

    /**
     * Test the route "index".
     */
    public function testapiAction()
    {
        $res = $this->curl->curl(["Hej"]);
        $this->assertInternalType("array", $res);
    }
}
