<?php

namespace Vilija19\Core\Components\Responce;

use Vilija19\Core\Components\ComponentFactory;

class ResponceFactory extends ComponentFactory
{
    protected function createConcreteComponent()
    {
        return new Responce();
    }

}