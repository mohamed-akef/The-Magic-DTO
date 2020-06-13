<?php

namespace Akef\MDTO\Handlers;

use Akef\MDTO\Helpers\StringHelper;

/**
 * Class HandlerFactory
 *
 * @package Akef\MDTO\Handlers
 */
class HandlerFactory
{

    /**
     * Get behavior handler
     *
     * Get requested behavior handler,
     * otherwise throw method not exist exception with message describe the property not exist
     *
     * @param      $requestedType
     *
     * @return \Akef\MDTO\Handlers\HandlerContract
     * @throws \Exception
     */
    public static function init($requestedType) : HandlerContract {
        $return = HandlerContract::class;

        switch ($requestedType) {
            case StringHelper::TYPE_GETTER:
                $return = new GetterHandler();
                break;
            case StringHelper::TYPE_SETTER:
                $return = new SetterHandler();
                break;
            case "":
                throw new \RuntimeException('The magic DTO: The requested type not handled');
                break;
        }

        return $return;
    }
}
