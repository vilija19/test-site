<?php

namespace Vilija19\Core\Components\Routing;

use Vilija19\Core\Components\ComponentFactory;

class RouterFactory extends ComponentFactory
{
    protected function createConcreteComponent()
    {
        return new Router($this->arguments);
    }
}