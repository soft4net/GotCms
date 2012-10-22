<?php
namespace Gc\Core;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:10.
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Config
     */
    protected $_object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->_object = new Config;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        unset($this->_object);
    }

    /**
     * @covers Gc\Core\Config::getInstance
     */
    public function testGetInstance()
    {
        $this->assertInstanceOf('Config', Config::getInstance());
    }

    /**
     * @covers Gc\Core\Config::getValue
     */
    public function testGetValue()
    {
        $this->_object->insert(array('identifier' => 'string_test', 'value' => 'string_result'));
        $this->assertEquals('string_result', $this->_object->getValue('string_test'));
    }

    /**
     * @covers Gc\Core\Config::getValues
     */
    public function testGetValues()
    {
        $this->_object->insert(array('identifier' => 'values_test', 'value' => 'values_result'));
        $this->assertArrayHasKey('0', $this->_object->getValues());
    }

    /**
     * @covers Gc\Core\Config::setValue
     */
    public function testSetValue()
    {
        $this->_object->insert(array('identifier' => 'string_test_insert_value', 'value' => 'string_result_insert_value'));
        $this->assertEquals('string_result', $this->_object->getValue('string_test'));
    }
}
