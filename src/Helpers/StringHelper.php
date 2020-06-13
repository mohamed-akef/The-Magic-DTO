<?php

namespace Akef\MDTO\Helpers;

class StringHelper
{

    /**
     * define type when requested function is getter function
     */
    public const TYPE_GETTER = 'getter';

    /**
     * define type when requested function is setter function
     */
    public const TYPE_SETTER = 'setter';

    /**
     * @param string $name
     *
     * @return string
     */
    public static function getPropertyName(string $name) :string
    {
        return lcfirst(substr($name, 3));
    }
    
    /**
     * @param string $name
     *
     * @return string
     */
    public static function getType(string $name) :string
    {
        $type = '';
        if ('get' === substr($name, 0, 3)) {
            $type = self::TYPE_GETTER;
        } elseif ('set' === substr($name, 0, 3)) {
            $type = self::TYPE_SETTER;
        }

        return $type;
    }
}
