<?php
namespace App;
use App\Providers\AppServiceProvider;

class App{
    public $concrete;

    public function boot(){
        $this->concrete = new AppServiceProvider();
        $this->concrete->register(); 
    }

}