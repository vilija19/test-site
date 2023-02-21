<?php

namespace Vilija19\App\View;

class ProductCreateView implements \Vilija19\Core\Interfaces\RenderInterface
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
        $view .= '          <button type="button"  @click="submit" class="btn btn-primary">Save</button>'.PHP_EOL;
        $view .= '          <button type="button" class="btn btn-danger">Cancel</button>'.PHP_EOL;
        $view .= '      </div>'.PHP_EOL;
        $view .= '  </div>'.PHP_EOL;
        $view .= '  <div class="row border-top">'.PHP_EOL;

        $view .= '      <form id="product_form" ref="form" v-on:submit="sub" method="POST" action="/add-product/store">'.PHP_EOL;
        $view .= '        <div class="row align-items-center">'.PHP_EOL;
        $view .= '        <div class="col-sm-8 mt-4">'.PHP_EOL;
        $view .= '            <div class="row mb-3 ">'.PHP_EOL;
        $view .= '                <label for="sku" class="col-sm-2 col-form-label">SKU</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" class="form-control" id="sku" name="sku">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;
        $view .= '            <div class="row mb-3 ">'.PHP_EOL;
        $view .= '                <label for="name" class="col-sm-2 col-form-label">Name</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" class="form-control" id="name" name="name">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;
        $view .= '            <div class="row mb-3 ">'.PHP_EOL;
        $view .= '                <label for="price" class="col-sm-2 col-form-label">Price ($)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" class="form-control" id="price" name="price">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;  
        $view .= '            <div class="row mb-3 ">'.PHP_EOL;
        $view .= '                <label for="type" class="col-sm-2 col-form-label">Type Switcher</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <select id="productType" v-model="selectedOption" class="form-select" name="type" aria-label="Product type">'.PHP_EOL;
        $view .= '                        <option value="Dvd">DVD</option>'.PHP_EOL;
        $view .= '                        <option value="Book">Book</option>'.PHP_EOL;
        $view .= '                        <option value="Furniture">Furniture</option>'.PHP_EOL;
        $view .= '                    </select>'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;
        $view .= '            <div id="DVD" v-if="selectedOption === \'Dvd\'">'.PHP_EOL;
        $view .= '              <div class="row mb-3">'.PHP_EOL;
        $view .= '                <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" class="form-control" id="size" name="size">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '              </div>'.PHP_EOL;
        $view .= '              <div class="row mb-3"> *Product Description*</div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;
        $view .= '            <div id="Furniture" v-if="selectedOption === \'Furniture\'">'.PHP_EOL;
        $view .= '              <div class="row mb-3">'.PHP_EOL;
        $view .= '                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" class="form-control" id="height" name="height">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '              </div>'.PHP_EOL;
        $view .= '              <div class="row mb-3">'.PHP_EOL;
        $view .= '                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" class="form-control" id="width" name="width">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL; 
        $view .= '              </div>'.PHP_EOL;
        $view .= '              <div class="row mb-3">'.PHP_EOL;
        $view .= '                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" class="form-control" id="length" name="length">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '              </div>'.PHP_EOL;
        $view .= '              <div class="row mb-3"> *Product Description*</div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;              
        $view .= '            <div id="Book" v-if="selectedOption === \'Book\'">'.PHP_EOL;
        $view .= '              <div class="row mb-3">'.PHP_EOL;
        $view .= '                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" class="form-control" id="weight" name="weight">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '              </div>'.PHP_EOL;
        $view .= '              <div id="DVD" class="row mb-3"> *Product Description*</div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;        
        $view .= '        </div>'.PHP_EOL;
        $view .= '        <div class="col-sm-4 mt-4">'.PHP_EOL;
        $view .= '        </div>'.PHP_EOL;
        $view .= '       </div>'.PHP_EOL;        
        $view .= '      </form>'.PHP_EOL;

        $view .= '  </div>'.PHP_EOL;
        $view .= '</div>'.PHP_EOL;

        $view .= '<script>
                    const app = new Vue({
                        el: \'#app\',
                        data: {
                            selectedOption: \'Dvd\',
                            sub: true
                        },
                        methods: {
                            submit: function (event) {
                                console.log(\'submit\');
                                document.getElementById("product_form").submit();
                            }
                        }
                    })
                  </script>'.PHP_EOL;
        echo $view;
    }
}
