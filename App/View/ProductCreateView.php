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

        $view .= '      <form id="product_form" v-on:submit="sub" method="POST" action="/add-product/store" novalidate>'.PHP_EOL;
        $view .= '        <div class="row align-items-center">'.PHP_EOL;
        $view .= '        <div class="col-sm-8 mt-4">'.PHP_EOL;
        $view .= '            <div class="row mb-3 ">'.PHP_EOL;
        $view .= '                <label for="sku" class="col-sm-2 col-form-label">SKU</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input v-model="sku" type="text" placeholder="Enter sku" class="form-control required" id="sku" name="sku">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;
        $view .= '            <div class="row mb-3 ">'.PHP_EOL;
        $view .= '                <label for="name" class="col-sm-2 col-form-label">Name</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input v-model="name" type="text" placeholder="Enter Name" class="form-control required" id="name" name="name">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;
        $view .= '            <div class="row mb-3 ">'.PHP_EOL;
        $view .= '                <label for="price" class="col-sm-2 col-form-label">Price ($)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" placeholder="Enter Price" class="form-control required" id="price" name="price">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;  
        $view .= '            <div class="row mb-3 ">'.PHP_EOL;
        $view .= '                <label for="type" class="col-sm-2 col-form-label">Type Switcher</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <select id="productType" v-model="selectedOption" placeholder="Select type" class="form-select" name="type" aria-label="Product type">'.PHP_EOL;
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
        $view .= '                    <input type="text" placeholder="Enter size" class="form-control required" id="size" name="size">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '              </div>'.PHP_EOL;
        $view .= '              <div class="row mb-3"> *Product Description*</div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;
        $view .= '            <div id="Furniture" v-if="selectedOption === \'Furniture\'">'.PHP_EOL;
        $view .= '              <div class="row mb-3">'.PHP_EOL;
        $view .= '                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" placeholder="Enter height" class="form-control required" id="height" name="height">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '              </div>'.PHP_EOL;
        $view .= '              <div class="row mb-3">'.PHP_EOL;
        $view .= '                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" placeholder="Enter width" class="form-control required" id="width" name="width">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL; 
        $view .= '              </div>'.PHP_EOL;
        $view .= '              <div class="row mb-3">'.PHP_EOL;
        $view .= '                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" placeholder="Enter length" class="form-control required" id="length" name="length">'.PHP_EOL;
        $view .= '                </div>'.PHP_EOL;
        $view .= '              </div>'.PHP_EOL;
        $view .= '              <div class="row mb-3"> *Product Description*</div>'.PHP_EOL;
        $view .= '            </div>'.PHP_EOL;              
        $view .= '            <div id="Book" v-if="selectedOption === \'Book\'">'.PHP_EOL;
        $view .= '              <div class="row mb-3">'.PHP_EOL;
        $view .= '                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>'.PHP_EOL;
        $view .= '                <div class="col-sm-3">'.PHP_EOL;
        $view .= '                    <input type="text" placeholder="Enter weight" class="form-control required" id="weight" name="weight">'.PHP_EOL;
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
                            name: null,
                            sku: null,
                            price: null,
                            size: null,
                            height: null,
                            width: null,
                            length: null,
                            weight: null,
                            sub: true
                        },
                        props: {
                            sku: String
                        },
                        methods: {
                            submit: function (event) {

                                if(this.ValidateInput()) {
                                    this.$el.querySelector("#product_form").submit();
                                }
                            },
                            ValidateInput: function () {
                                let isValid = true;
                                let fieldsRegex = [
                                    {name: \'name\', regex: /^[a-zA-Z0-9 ]{3,30}$/},
                                    {name: \'sku\', regex: /^[a-zA-Z0-9]{3,30}$/},
                                    {name: \'price\', regex: /^[0-9]{1,10}$/},
                                    {name: \'size\', regex: /^[0-9]{1,10}$/},
                                    {name: \'height\', regex: /^[0-9]{1,10}$/},
                                    {name: \'width\', regex: /^[0-9]{1,10}$/},
                                    {name: \'length\', regex: /^[0-9]{1,10}$/},
                                    {name: \'weight\', regex: /^[0-9]{1,10}$/},
                                ];
                                this.$el.querySelectorAll(".required").forEach(function (item) {
                                    let re = fieldsRegex.find(x => x.name == item.attributes.name.value);
                                    if(isValid == true) {
                                        if(item.value == \'\') {
                                            alert(\'Please enter a \' + item.attributes.placeholder.value );
                                            isValid = false;
                                        }else if(re != undefined && !re.regex.test(item.value)){
                                            isValid = false;
                                            alert(\'provide the data of indicated type for a \' + item.attributes.placeholder.value );
                                        }
                                    }
                                });
                                return isValid;
                            }
                        }
                    })
                  </script>'.PHP_EOL;
        echo $view;
    }
}
