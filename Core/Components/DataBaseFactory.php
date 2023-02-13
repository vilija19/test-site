<?php

namespace Vilija19\Core\Components;

use Vilija19\Core\Components\ComponentFactory;

class DataBaseFactory extends ComponentFactory
{
    protected function createConcreteComponent()
    {
        $db = DataBase::getInstance($this->arguments);
        return $db;
    }

}