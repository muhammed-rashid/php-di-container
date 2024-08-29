<?php
namespace App;

class Singleton
{
    // Hold the single instance of the class
    private static $instance = null;
    private $container;

    // Private constructor to prevent direct creation
    private function __construct($container) {
        $this->container = $container;
    }

    // Get the single instance of the class
    public static function getInstance()
    {
        return self::$instance->container;
    }

    public static function setInstance($container)
    {
        if (!self::$instance) {
            self::$instance = new self($container);
        }

    }


}
