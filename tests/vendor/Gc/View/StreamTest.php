<?php
namespace Gc\View;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:08.
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class StreamTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $existed = in_array("zend.view", stream_get_wrappers());
        if($existed)
        {
            stream_wrapper_unregister("zend.view");
        }
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Gc\View\Stream::stream_open
     */
    public function testStream_open()
    {
        stream_wrapper_register('zend.view', '\Gc\View\Stream');
        $file = fopen('zend.view://Stream', 'r+');
        $this->assertInternalType(\PHPUnit_Framework_Constraint_IsType::TYPE_RESOURCE, $file);
    }

    /**
     * @covers Gc\View\Stream::stream_read
     */
    public function testStream_read()
    {
        stream_wrapper_register('zend.view', '\Gc\View\Stream');
        file_put_contents('zend.view://Stream', 'test');
        $this->assertEquals(file_get_contents('zend.view://Stream'), 'test');
    }

    /**
     * @covers Gc\View\Stream::stream_write
     */
    public function testStream_write()
    {
        stream_wrapper_register('zend.view', '\Gc\View\Stream');
        file_put_contents('zend.view://Stream', 'test');
        $this->assertEquals(file_get_contents('zend.view://Stream'), 'test');
    }
}
