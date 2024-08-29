<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\App;
use App\Controllers\HomeController;
use App\Controllers\PaymentGatewayController;
use App\Router\Router;

$kernal = new App();
$kernal->boot();

$router = $kernal->concrete->app->get(Router::class);


$router->get('/',[HomeController::class,'index']);
$router->get('hello',[HomeController::class,'hello']);
$router->get('pay',[PaymentGatewayController::class,'pay']);

$router->resolve();
