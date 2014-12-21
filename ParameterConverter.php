<?php

namespace Zebba\Component\Utility;

class ParameterConverter
{
    static public function toArray($args, $type_of = null)
    {
        if (is_array($args)) {
            $failed = array_filter($args, function ($e) use ($type_of) {
                return ($type_of !== get_class($e));
            });

            if (0 < count($failed)) { return new \DomainException(sprintf('You must provide only objects of class %s.'), $type_of); }
        } else {
            if ($type_of !== get_class($args)) { return new \DomainException(sprintf('You must provide only objects of class %s.', $type_of)); }

            $args = array($args);
        }

        return $args;
    }
}