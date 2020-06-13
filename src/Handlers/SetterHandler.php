<?php

namespace Akef\MDTO\Handlers;

use Akef\MDTO\Helpers\ObjectHelper;

/**
 * Class SetterHandler
 *
 * @package Akef\MDTO\Handlers
 */
class SetterHandler implements HandlerContract
{

    /**
     * @var object
     */
    protected $requestedClass;

    /**
     * Set the value into property
     *
     * @param object $requestedClass
     * @param string $propertyName
     * @param null   $argument
     *
     * @return $this
     * @throws \ReflectionException
     */
    public function run($requestedClass, $propertyName, $argument = null): SetterHandler
    {
        $reflectionProperty = ObjectHelper::getReadyPropertyReflection($requestedClass, $propertyName);

        $reflectionProperty->setValue($requestedClass, $argument);

        $this->requestedClass = $requestedClass;

        return $this;
    }

    /**
     * Return the requested class to support create chain of methods call
     *
     * @return object
     */
    public function getOutput()
    {
        return $this->requestedClass;
    }
}
