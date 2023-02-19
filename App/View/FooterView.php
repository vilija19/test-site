<?php

namespace Vilija19\App\View;

class FooterView implements \Vilija19\Core\Interfaces\RenderInterface
{
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }
    public function render()
    {
        $view = '   </div>';
        $view .= '  <footer>';
        $view .= '      <div class="container"><div class="row align-items-center">';
        $view .= '          <div class="col text-center"><p>'.$this->data['footer_text'].'</p></div>';
        $view .= '      </div></div>';
        $view .= '  </footer>';
        $view .= '</body>';
        $view .= '</html>';


        echo $view;
    }
}
