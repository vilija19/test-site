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

        $orm = Application::getApp()->getComponent('orm');
        $orm->setModel(\Vilija19\App\Model\Product::class);
        $data['products'] = $orm->get()->all();

        $this->responce->setOutput('HomeView', $data);

    }

    public function delete()
    {
        \Vilija19\App\Model\Product::massDelete($_POST['selected-products'] ?? []);

        $this->responce->redirect('/');
    }
}