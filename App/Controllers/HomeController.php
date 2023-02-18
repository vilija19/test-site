<?php

namespace Vilija19\App\Controllers;

use Vilija19\Core\Application;

class HomeController
{
    private $responce;

    public function __construct()
    {
        $this->responce = Application::getApp()->getComponent('responce');
    }

    public function index()
    {
        $data = ['title' => 'Home page'];

        $orm = application::getApp()->getComponent('orm');
        $orm->setModel(\Vilija19\App\Model\Product::class);
        $products = $orm->getAll();

        $this->responce->setOutput('HomeView', $data);

    }
}