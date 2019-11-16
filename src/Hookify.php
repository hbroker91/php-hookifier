<?php
declare(strict_types=1);

namespace Hbroker\PHPHookifier;

/**
 * ## Mixin to add custom logic at specific lifecycle points of a class
 */
trait Hookify
{
    /**
     * ### Executes custom logic before class instantiation
     *
     * @param array $options - optional arguments
     *
     * @return bool
     */
    public static function beforeConstruct(... $options): bool
    {
    }

    /**
     * ### Executes custom logic after class destruction
     *
     * @param array $options - optional arguments
     *
     * @return bool
     */
    public static function afterDestroy(... $options): bool
    {
    }

}