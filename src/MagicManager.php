<?php

namespace Akef\MDTO;

use Akef\MDTO\Handlers\HandlerFactory;
use Akef\MDTO\Helpers\ObjectHelper;
use Akef\MDTO\Helpers\StringHelper;

class MagicManager
{

    /**
     * @var string
     */
    protected $requestedType;

    /**
     * @var string
     */
    protected $functionName;

    /**
     * @var bool
     */
    protected $isPropertyExists;

    /**
     * @var object
     */
    protected $requestedClass;

    /**
     * @var mixed
     */
    protected $functionArgument;

    /**
     * @var string
     */
    protected $propertyName;

    /**
     * @param $requestedClass
     * @param $name
     * @param $arguments
     *
     * @return $this
     */
    public function init($requestedClass, $name, $arguments): MagicManager
    {
        $this->functionName = $name;
        $this->functionArgument = ($arguments[0] ?? null);
        $this->requestedClass = $requestedClass;
        $this->propertyName = StringHelper::getPropertyName($name);
        $this->isPropertyExists = ObjectHelper::isPropertyExists($this->propertyName, $requestedClass);
        $this->requestedType = StringHelper::getType($name);

        return $this;
    }

    /**
     * Run magic :D
     *
     * Run normal behaviors if requesting getter of setter,
     * otherwise throw method not exist exception
     *
     * @return mixed
     * @throws \Exception
     * @todo refactor conditions chain
     *
     */
    public function run()
    {
        if ($this->requestedType) {
            if ($this->isPropertyExists) {
                $handler = HandlerFactory::init($this->requestedType);
            } else {
                throw new \BadMethodCallException('The magic DTO: the property ' . $this->propertyName . ' not exist.');
            }
        } else {
            throw new \BadMethodCallException('The magic DTO: the method ' . $this->functionName . ' not exist.');
        }

        $handler->run(
            $this->requestedClass,
            $this->propertyName,
            $this->functionArgument
        );

        return $handler->getOutput();
    }
}
