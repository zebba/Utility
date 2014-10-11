<?php

namespace Zebba\Component\Utility;

class ParameterConverter
{
    static public function toArray($args, $type_of = null)
    {
        if (is_array($args)) {
            $failed = array_filter($args, function ($e) use ($type_of) {
                return $e instanceof $type_of;
            });

            if (0 < count($failed)) { return \DomainException(sprintf('You must provide only objects of class %s.'), $type_of); }
        } else {
            if (! $args instanceof $type_of) { return \DomainException(sprintf('You must provide only objects of class %s.', $type_of)); }

            $args = array($args);
        }

        return $args;
    }
}