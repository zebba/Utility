<?php

namespace Zebba\Component\Utility\Tests;

use Zebba\Component\Utility\ClassUtility;

/**
 * @author Sebastian Kuhlmann <zebba@hotmail.de>
 */
class ClassUtilityTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 *
	 * @param string $access
	 * @param string $input
	 * @param string $output
	 */
	public function testGenerateMethodName($access, $input, $output)
	{
		$this->assertEquals($output, ClassUtility::generateMethodName($access, $input));
	}

	public function dataProvider()
	{
		return array(
			array(ClassUtility::ACCESS_GET, 'input', 'getInput'),
			array(ClassUtility::ACCESS_SET, 'input', 'setInput'),
			array(ClassUtility::ACCESS_GET, 'one_input', 'getOneInput'),
			array(ClassUtility::ACCESS_SET, 'one_input', 'setOneInput'),
			array(ClassUtility::ACCESS_GET, 'oneInput', 'getOneInput'),
			array(ClassUtility::ACCESS_SET, 'oneInput', 'setOneInput'),
			array(ClassUtility::ACCESS_GET, 'one input', 'getOneInput'),
			array(ClassUtility::ACCESS_SET, 'one input', 'setOneInput'),

			array(ClassUtility::ACCESS_GET, 'input1', 'getInput1'),
			array(ClassUtility::ACCESS_GET, 'one_input_1', 'getOneInput1'),
			array(ClassUtility::ACCESS_GET, 'oneInput1', 'getOneInput1'),
			array(ClassUtility::ACCESS_GET, 'one input 1', 'getOneInput1'),
		);
	}
}