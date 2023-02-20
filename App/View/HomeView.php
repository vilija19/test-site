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

        $view = '  <div class="row align-items-center">'.PHP_EOL;
        $view .= '      <div class="col-sm-10"><h1>' . $this->data['title']  . '</h1></div>'.PHP_EOL;
        $view .= '      <div class="col-sm-2">'.PHP_EOL;
        $view .= '          <a href="/add-product" role="button" class="btn btn-primary">ADD</a>'.PHP_EOL;
        $view .= '          <button type="button" id="delete-product-btn" class="btn btn-danger">MASS DELETE</button>'.PHP_EOL;
        $view .= '      </div>'.PHP_EOL;
        $view .= '  </div>'.PHP_EOL;
        $view .= '  <div class="row border-top">'.PHP_EOL;

        foreach ($this->data['products'] as $product) {
            $view .= '      <div class="col-sm-2 border mt-4 pb-5">'.PHP_EOL;
            $view .= '          <div class="row align-items-center"><div class="col">'.PHP_EOL;
            $view .= '              <input class="form-check-input delete-checkbox" name="select-product[]" type="checkbox" value="'.$product->id.'">'.PHP_EOL;
            $view .= '          </div></div>'.PHP_EOL;
            $view .= '          <div class="row"><div class="col text-center">'.$product->sku.'</div></div>'.PHP_EOL;
            $view .= '          <div class="row"><div class="col text-center">'.$product->name.'</div></div>'.PHP_EOL;
            $view .= '          <div class="row"><div class="col text-center">'.$product->price.' $</div></div>'.PHP_EOL;
            foreach ($product->attributes as $attribute) {
            $view .= '          <div class="row"><div class="col text-center">'.PHP_EOL;
            $view .= '              ' . $attribute->name . ': ' . $attribute->value . ' ' . $attribute->attribute->value_unit;
            $view .= '          </div></div>'.PHP_EOL;
            }
            $view .= '      </div>'.PHP_EOL;
        }

        $view .= '  </div>'.PHP_EOL;
        $view .= '</div>'.PHP_EOL;

        echo $view;
    }
}
