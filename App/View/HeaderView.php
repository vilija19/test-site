<?php

namespace Vilija19\App\View;

class HeaderView implements \Vilija19\Core\Interfaces\RenderInterface
{
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }
    public function render()
    {
        $view = '<!DOCTYPE html><html><head>';
        $view .= '  <title>'.$this->data['title'].'</title>';
        $view .= '  <meta charset="UTF-8">';
        $view .= '  <meta name="viewport" content="width=device-width, initial-scale=1.0">';
        $view .= '  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">';
        $view .= '  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>';
        $view .= '</head>';
        $view .= '<body>';
        $view .= '<div class="container mt-3" style="min-height: 700px;">';


        echo $view;
    }
}
