<?php declare(strict_types=1);

namespace Jorpo\Dependency;

use Auryn\Injector as ActualAurynInjector;

class AurynInjector implements Injector
{
    private ActualAurynInjector $injector;

    public function __construct(ActualAurynInjector $injector)
    {
        $this->injector = $injector;
    }

    public function alias(string $original, string $alias): static
    {
        $this->injector->alias($original, $alias);
        return $this;
    }

    public function define(string $name, array $args): static
    {
        $this->injector->define($name, $args);
        return $this;
    }

    public function delegate(string $name, callable $callback): static
    {
        $this->injector->delegate($name, $callback);
        return $this;
    }

    public function make(string $name, array $arguments = []): mixed
    {
        $this->injector->make($name, $arguments);
        return $this;
    }

    public function param(string $name, mixed $value): static
    {
        $this->injector->defineParam($name, $value);
        return $this;
    }

    public function prepare(string $name, callable $callback): static
    {
        $this->injector->prepare($name, $callback);
        return $this;
    }

    public function share(mixed $item): static
    {
        $this->injector->share($item);
        return $this;
    }
}
