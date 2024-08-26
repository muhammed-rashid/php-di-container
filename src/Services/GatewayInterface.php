<?php
namespace App\Services;

interface GatewayInterface
{
    public function pay($value);
}