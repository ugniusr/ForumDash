<?php

namespace ForumdashTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ForumdashControllerTest extends AbstractHttpControllerTestCase
{
	protected $traceError = true;
    public function setUp()
    {
        $this->setApplicationConfig(
			include '/Users/ugniusr/Projects/ForumDash/config/application.config.php'
        );
        parent::setUp();
    }
    public function testIndexActionCanBeAccessed()
	{
	    $this->dispatch('/forumdash');
	    $this->assertResponseStatusCode(200);

	    $this->assertModuleName('Forumdash');
	    $this->assertControllerName('Forumdash\Controller\Forumdash');
	    $this->assertControllerClass('ForumdashController');
	    $this->assertMatchedRouteName('forumdash');
	}
}