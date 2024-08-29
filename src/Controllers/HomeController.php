<?php
namespace App\Controllers;

use App\Facades\GatewayFacade;

class HomeController
{
   
    public function index()
    {
        echo GatewayFacade::pay(100);
    }

    public function hello()
    {
        echo "Hello World";
    }
}