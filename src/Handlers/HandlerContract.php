<?php

namespace Akef\MDTO\Handlers;

interface HandlerContract{

    /**
     * Run the required logic from handler
     *
     * @param object $requestedClass
     * @param string $propertyName
     * @param null   $argument
     *
     * @return \Akef\MDTO\Handlers\HandlerContract
     */
    public function run($requestedClass, $propertyName, $argument = null) : HandlerContract;

    /**
     * Return the output of handler after run
     * 
     * @return mixed
     */
    public function getOutput();
}
