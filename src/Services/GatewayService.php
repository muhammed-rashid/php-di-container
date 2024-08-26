<?php
namespace App\Services;

class GatewayService implements GatewayInterface
{
    public function __construct(public SmsServiceInterface $smsService)
    { 
    }
    
    public function pay($value)  {
        echo "Payment is processing from GatewayService";
    }
}