<?php
namespace App\Facades;
use App\Services\GatewayInterface;

class GatewayFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GatewayInterface::class;
    }
}