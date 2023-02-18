<?php

namespace Vilija19\Core\Components\Orm;

use Vilija19\Core\Components\ComponentFactory;

class SimpleOrmFactory extends ComponentFactory
{
    protected function createConcreteComponent()
    {
        return new SimpleOrm();
    }

}