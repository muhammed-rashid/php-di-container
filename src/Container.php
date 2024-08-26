<?php

namespace App;

use Exception;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get($id)
    {
        if ($this->has($id)) {
            $concrete = $this->entries[$id];
            if (is_callable($concrete)) {
                return $concrete($this);
            }
            $id = $concrete;
        }
        return $this->resolve($id);
    }

    public function has($id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable|string $concrete)
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve($id)
    {
        if (class_exists($id)) {
            $reflection = new \ReflectionClass($id);

            if (!$reflection->isInstantiable()) {
                throw new Exception("Class is not instantiable");
            }
            $constructor = $reflection->getConstructor();
            //if constructor not exists return new instance
            if (!$constructor) {
                return new $id;
            }

            $parameters = $constructor->getParameters();
            $dependencies = [];

            foreach ($parameters as $parameter) {
                $type = $parameter->getType();
                if (!$type) {
                    throw new Exception("Failed to resolve dependency because we can not determine the type of the parameter");
                }
                if ($type->isBuiltin()) {
                    throw new Exception("Failed to resolve dependency because it is a builtin type");
                }
                $dependencies[] = $this->get($parameter->getType()->getName());
            }
            return $reflection->newInstanceArgs($dependencies);
        }
        
        return new $id;
    }
}
