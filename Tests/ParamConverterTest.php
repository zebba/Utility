<?php

namespace Zebba\Component\Utility\Tests;

use Zebba\Component\Utility\ParameterConverter;

/**
 * @author Sebastian Kuhlmann <zebba@hotmail.de>
 */
class ParamConvertTest extends \PHPUnit_Framework_TestCase
{
	public function testValidArray()
	{
		$now = new \DateTime('now');

		$input = array($now, $now, $now);
		$output = array($now, $now, $now);

		$this->assertEquals($output, ParameterConverter::toArray($input, '\DateTime'));
	}

	public function testValidScalar()
	{
		$now = new \DateTime('now');

		$this->assertEquals(array($now), ParameterConverter::toArray($now, '\DateTime'));
	}

	/**
	 * @expectedException \DomainException
	 */
	public function testInvalidArray()
	{
		$now = new \DateTime('now');
		$interval = new \DateInterval('P1D');

		ParameterConverter::toArray(array($now, $interval), '\DateTime');
	}

	/**
	 * @expectedException \DomainException
	 */
	public function testInvalidScalar()
	{
		$now = new \DateTime('now');

		ParameterConverter::toArray($now, '\DatePeriod');
	}

	/**
	 * @expectedException \DomainException
	 */
	public function testInvalidArrayTypes()
	{
		$string = 'string';
		$int = 0;

		ParameterConverter::toArray(array($string, $int), 'string');
	}

	/**
	 * @expectedException \DomainException
	 */
	public function testInvalidScalarTypes()
	{
		$string = 'string';

		ParameterConverter::toArray($string, 'string');
	}
}