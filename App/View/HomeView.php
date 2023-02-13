<?php

namespace Vilija19\App\View;

class HomeView implements \Vilija19\Core\Interfaces\RenderInterface
{
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }
    public function render()
    {
        $view = '<h1>' . $this->data['title'] ?? '' . '</h1>';
        echo $view;
    }
}
