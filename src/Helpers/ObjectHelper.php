<?php

namespace Akef\MDTO\Helpers;

class ObjectHelper
{

    /**
     * @param string $name
     * @param object $requestedClass
     *
     * @return bool
     */
    public static function isPropertyExists(string $name, $requestedClass) :bool
    {
        $isPropertyExists = false;

        if (property_exists($requestedClass, $name)) {
            $isPropertyExists = true;
        }

        return $isPropertyExists;
    }

    /**
     * Get property reflection class ready for access
     * 
     * @param $requestedClass
     * @param $propertyName
     *
     * @return \ReflectionProperty
     * @throws \ReflectionException
     */
    public static function getReadyPropertyReflection($requestedClass, $propertyName): \ReflectionProperty
    {
        $reflectionClass = new \ReflectionClass($requestedClass);

        $reflectionProperty = $reflectionClass->getProperty($propertyName);
        $reflectionProperty->setAccessible(true);
        
        return $reflectionProperty;
    }
}
