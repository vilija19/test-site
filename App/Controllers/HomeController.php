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
        $data['title'] = 'Product list';
        $data['footer_text'] = 'Scanduweb Test assignment';

        $orm = application::getApp()->getComponent('orm');
        $orm->setModel(\Vilija19\App\Model\Product::class);
        $data['products'] = $orm->get()->all();

        // $this->responce->setOutput('HeaderView', $data);
        // $data['header'] = 'test';
        // $data['footer'] = 'test';

        $this->responce->setOutput('HomeView', $data);

    }
}