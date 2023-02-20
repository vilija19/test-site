<?php

namespace Vilija19\App\Controllers;

use Vilija19\Core\Application;

class ProductController
{
    private $responce;

    public function __construct()
    {
        $this->responce = Application::getApp()->getComponent('responce');
    }

    public function create()
    {
        $data['title'] = 'Add Product';
        $data['footer_text'] = 'Scanduweb Test assignment';

        $orm = application::getApp()->getComponent('orm');
        $orm->setModel(\Vilija19\App\Model\Product::class);

        $this->responce->setOutput('ProductCreate', $data);
    }

}