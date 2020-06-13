<?php

namespace Akef\MDTO;

/**
 * Trait SetAndGetHider
 * 
 * Give you access to Getter and Setter functions without implement them.
 *
 * @package Akef\MDTO
 */
trait SetAndGetHider
{

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        return (new MagicManger())->init($this, $name, $arguments)->run();
    }
}
