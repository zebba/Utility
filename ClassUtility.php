<?php

namespace Zebba\Component\Utility;

/**
 * @author Sebastian Kuhlmann <zebba@hotmail.de>
 */
class ClassUtility
{
	const ACCESS_GET = 'get';
	const ACCESS_SET = 'set';

    /**
     * Generates a method name.
     *
     * <code>
	 * <?php
	 *  namespace Foo;
	 *
	 *  $datetimes = \Zebba\Component\Utility\ClassUtility::generateMethodName('get, 'date_time'); // getDateTime
	 * ?>
	 * </code>
     *
     * @param string $access
     * @param string $column
     * @return string
     */
    static public function generateMethodName($access, $column)
    {
    	$column = preg_split('/(?=\p{Lu})/u', $column);
    	$column = implode('_', $column);

        return sprintf('%s%s',
        	strtolower($access),
        	str_replace(' ', '', ucwords(str_replace('_', ' ', strtolower($column)))));
    }
}