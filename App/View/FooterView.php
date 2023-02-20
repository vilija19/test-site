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
        $view = '   </div>'.PHP_EOL;
        $view .= '  <footer>'.PHP_EOL;
        $view .= '      <div class="container"><div class="row align-items-center">'.PHP_EOL;
        $view .= '          <div class="col text-center"><p>'.$this->data['footer_text'].'</p></div>'.PHP_EOL;
        $view .= '      </div></div>'.PHP_EOL;
        $view .= '  </footer>'.PHP_EOL;
        $view .= '</body>'.PHP_EOL;
        $view .= '</html>'.PHP_EOL;


        echo $view;
    }
}
