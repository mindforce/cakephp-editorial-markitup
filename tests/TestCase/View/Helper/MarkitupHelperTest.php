<?php
namespace Editorial\Test\TestCase\Markitup\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Editorial\Markitup\View\Helper\MarkitupHelper;

/**
 * Editorial\Markitup\View\Helper\MarkitupHelper Test Case
 */
class MarkitupHelperTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Markitup = new MarkitupHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Markitup);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
