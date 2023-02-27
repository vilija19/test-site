<?php

namespace Vilija19\Core\Components\Template;

use Vilija19\Core\Components\ComponentFactory;

class TemplateFactory extends ComponentFactory
{
    protected function createConcreteComponent()
    {
        return new Template();
    }

}