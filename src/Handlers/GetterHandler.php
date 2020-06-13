<?php

namespace Akef\MDTO\Handlers;

use Akef\MDTO\Helpers\ObjectHelper;

/**
 * Class GetterHandler
 *
 * @package Akef\MDTO\Handlers
 */
class GetterHandler implements HandlerContract
{

    /**
     * @var mixed
     */
    protected $propertyValue;


    /**
     * Get the value form property and set it on $this->propertyValue
     *
     * @param object $requestedClass
     * @param string $propertyName
     * @param null   $argument
     *
     * @return $this
     * @throws \ReflectionException
     */
    public function run($requestedClass, $propertyName, $argument = null) : GetterHandler
    {
        $reflectionProperty = ObjectHelper::getReadyPropertyReflection($requestedClass, $propertyName);
        
        $this->propertyValue = $reflectionProperty->getValue($requestedClass);

        return $this;
    }

    /**
     * Return the value of requested property
     * 
     * @return mixed
     */
    public function getOutput()
    {
        return $this->propertyValue;
    }
}
