<?php
namespace App\Providers;

use App\Router\Router;
use App\Services\GatewayInterface;
use App\Services\GatewayService;
use App\Services\SmsService;
use App\Services\SmsServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->set(GatewayInterface::class, GatewayService::class);
        $this->app->set(SmsServiceInterface::class, SmsService::class);
        $this->app->set(Router::class,function(){
            return new Router($this->app);
        });
        $this->app->set('gateway',GatewayService::class);
    }
}