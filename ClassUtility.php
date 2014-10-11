<?php

namespace Zebba\Component\Utility;

class ClassUtility
{
    /**
     * @param string $access
     * @param string $column
     * @return string
     */
    static public function generateMethodName($access, $column)
    {
        return sprintf('%s%s', strtolower($access), str_replace(' ', '', ucwords(str_replace('_', ' ', strtolower($column)))));
    }
}