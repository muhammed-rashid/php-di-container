<?php

namespace App\Services;

class SmsService implements SmsServiceInterface
{
    
    public function send($message)  {
        echo "Message is sending from servicess";
    }
}