<?php
require_once dirname(__FILE__) . '/../../lib/XS.class.php';

/**
 * Test class for XSErrorException.
 * Generated by PHPUnit on 2011-07-23 at 20:26:03.
 */
class XSErrorExceptionTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException XSErrorException
	 * @expectedExceptionMessage test user warning
	 */
	public function testTrigger()
	{
		error_reporting(E_ALL & ~(E_NOTICE | E_USER_NOTICE));
		trigger_error('test user notice', E_USER_NOTICE);
		trigger_error('test user warning', E_USER_WARNING);
	}
	
	public function test__toString()
	{
		try
		{
			trigger_error('test user warning', E_USER_WARNING);
		}
		catch (XSErrorException $e)
		{			
		}
		
		$this->assertInstanceOf('XSErrorException', $e);
		$this->assertEquals('[XSErrorException] lib/XSErrorExceptionTest.php(25): test user warning(512)', strval($e));
	}	
}
