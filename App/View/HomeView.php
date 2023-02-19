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

        $view = '  <div class="row align-items-center">';
        $view .= '      <div class="col-sm-10"><h1>' . $this->data['title']  . '</h1></div>';
        $view .= '      <div class="col-sm-2">';
        $view .= '          <a href="/add-product" role="button" class="btn btn-primary">ADD</a>';
        $view .= '          <button type="button" id="delete-product-btn" class="btn btn-danger">MASS DELETE</button>';
        $view .= '      </div>';
        $view .= '  </div>';
        $view .= '  <div class="row border-top">';

        foreach ($this->data['products'] as $product) {
            $view .= '      <div class="col-sm-2 border mt-4 pb-5">';
            $view .= '          <div class="row align-items-center"><div class="col">';
            $view .= '              <input class="form-check-input delete-checkbox" name="select-product[]" type="checkbox" value="'.$product->id.'">';
            $view .= '          </div></div>';
            $view .= '          <div class="row"><div class="col text-center">'.$product->sku.'</div></div>';
            $view .= '          <div class="row"><div class="col text-center">'.$product->name.'</div></div>';
            $view .= '          <div class="row"><div class="col text-center">'.$product->price.' $</div></div>';
            foreach ($product->attributes as $attribute) {
            $view .= '          <div class="row"><div class="col text-center">';
            $view .= '              ' . $attribute->name . ': ' . $attribute->value . ' ' . $attribute->attribute->value_unit;
            $view .= '          </div></div>';
            }
            $view .= '      </div>';
        }

        $view .= '  </div>';
        $view .= '</div>';

        echo $view;
    }
}
