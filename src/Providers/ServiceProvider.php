<?php

namespace App\Providers;

use App\Container;

class ServiceProvider
{
   public $app;
   public function __construct()
   {
    $this->app = new Container();
   }
}