<?php

namespace App\Facades;

use App\Singleton;

abstract class Facade
{

    protected static function getFacadeAccessor()
    {
        throw new \Exception('Facade does not implement getFacadeAccessor method.');
    }

    public static function __callStatic($method, $args)
    {
  
        $instance = static::resolveFacadeInstance(static::getFacadeAccessor());
        if (!$instance) {
            throw new \Exception('A facade root has not been set.');
        }
        return $instance->$method(...$args);
    }

    protected static function resolveFacadeInstance($name)
    {
        return Singleton::getInstance()->get($name);
    }
}
