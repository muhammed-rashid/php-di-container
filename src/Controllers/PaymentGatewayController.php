<?php
namespace App\Controllers;

use App\Services\GatewayInterface;


class PaymentGatewayController 
{
  public function __construct(private GatewayInterface $gatewayService)
    {
    }

   public function pay(){
    echo $this->gatewayService->pay(10);
   }
    
   
}