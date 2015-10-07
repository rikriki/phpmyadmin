<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Tests for PMA\libraries\navigation\nodes\NodeEventContainer class
 *
 * @package PhpMyAdmin-test
 */

use PMA\libraries\navigation\NodeFactory;
use PMA\libraries\Theme;

require_once 'libraries/navigation/NodeFactory.php';


require_once 'libraries/php-gettext/gettext.inc';

/**
 * Tests for PMA\libraries\navigation\nodes\NodeEventContainer class
 *
 * @package PhpMyAdmin-test
 */
class Node_Event_Container_Test extends PHPUnit_Framework_TestCase
{
    /**
     * SetUp for test cases
     *
     * @return void
     */
    public function setup()
    {
        $GLOBALS['server'] = 0;
        $_SESSION['PMA_Theme'] = Theme::load('./themes/pmahomme');
    }

    /**
     * Test for __construct
     *
     * @return void
     */
    public function testConstructor()
    {
        $parent = NodeFactory::getInstance('NodeEventContainer');
        $this->assertArrayHasKey(
            'text',
            $parent->links
        );
        $this->assertContains(
            'db_events.php',
            $parent->links['text']
        );
        $this->assertEquals('events', $parent->real_name);
    }
}
