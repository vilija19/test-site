<?php

namespace Vilija19\App\Components\Test;

use Vilija19\Core\Components\ComponentFactory;

class TestFactory extends ComponentFactory
{
    protected function createConcreteComponent()
    {
        return new Test();
    }
}