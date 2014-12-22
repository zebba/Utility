<?php

namespace Zebba\Component\Utility;

/**
 * @author Sebastian Kuhlmann <zebba@hotmail.de>
 */
class ParameterConverter
{
	/**
	 * Returns an array of objects of the same type
	 *
	 * <code>
	 * <?php
	 *  namespace Foo;
	 *
	 * 	$now = new \DateTime('now');
	 *
	 *  $datetimes = \Zebba\Component\Utility\ParameterConverter::toArray($now, '\DateTime'); // array($now)
	 *  $datetimes = \Zebba\Component\Utility\ParameterConverter::toArray(array($now, $now), '\DateTime'); // array($now, $now)
	 * ?>
	 * </code>
	 *
	 * @param mixed:object|object[] $args
	 * @param string $type_of
	 * @throws \DomainException if the provided input does not match the specified type $type_of
	 * @return object[]
	 */
    static public function toArray($args, $type_of = null)
    {
        if (is_array($args)) {
            $failed = array_filter($args, function ($e) use ($type_of) {
                return (! is_object($e) || ! $e instanceof $type_of);
            });

            if (0 < count($failed)) {
            	throw new \DomainException(sprintf('You must provide only objects of class %s.', $type_of));
            }
        } else {
            if (! is_object($args) || ! $args instanceof $type_of) {
            	throw new \DomainException(sprintf('You must provide only objects of class %s.', $type_of));
            }

            $args = array($args);
        }

        return $args;
    }
}