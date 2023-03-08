    <div class="row align-items-center"> 
        <div class="col-sm-10"><h1><?php echo $title ?? ''; ?></h1></div> 
        <div class="col-sm-2"> 
            <button type="button"  @click="submit" class="btn btn-primary">Save</button> 
            <a href="/" role="button" class="btn btn-danger">Cancel</a> 
        </div> 
    </div> 
    <div class="row border-top"> 
    <form id="product_form" v-on:submit="sub" method="POST" action="/add-product/store" novalidate> 
      <div class="row align-items-center"> 
        <div class="col-sm-8 mt-4"> 
            <div class="row mb-3 "> 
                <label for="sku" class="col-sm-2 col-form-label">SKU</label> 
                <div class="col-sm-3"> 
                    <input v-model="sku" type="text" placeholder="Enter sku" class="form-control required" id="sku" name="sku"> 
                </div> 
            </div> 
            <div class="row mb-3 "> 
                <label for="name" class="col-sm-2 col-form-label">Name</label> 
                <div class="col-sm-3"> 
                    <input v-model="name" type="text" placeholder="Enter Name" class="form-control required" id="name" name="name"> 
                </div> 
            </div> 
            <div class="row mb-3 "> 
                <label for="price" class="col-sm-2 col-form-label">Price ($)</label> 
                <div class="col-sm-3"> 
                    <input type="text" placeholder="Enter Price" class="form-control required" id="price" name="price"> 
                </div> 
            </div>   
            <div class="row mb-3 "> 
                <label for="type" class="col-sm-2 col-form-label">Type Switcher</label> 
                <div class="col-sm-3"> 
                    <select id="productType" v-model="selectedOption" placeholder="Select type" class="form-select" name="type" aria-label="Product type"> 
                        <option value="Dvd">DVD</option> 
                        <option value="Book">Book</option> 
                        <option value="Furniture">Furniture</option> 
                    </select> 
                </div> 
            </div> 
            <div id="DVD" v-if="selectedOption === 'Dvd'"> 
                <div class="row mb-3"> 
                <label for="size" class="col-sm-2 col-form-label">Size (MB)</label> 
                <div class="col-sm-3"> 
                    <input type="text" placeholder="Please, provide size" class="form-control required" id="size" name="attributes[size]"> 
                </div> 
                </div> 
                <div class="row mb-3"> *Product Description*</div> 
            </div> 
            <div id="Furniture" v-if="selectedOption === 'Furniture'"> 
                <div class="row mb-3"> 
                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label> 
                <div class="col-sm-3"> 
                    <input type="text" placeholder="Please, provide height" class="form-control required" id="height" name="attributes[dimension][height]"> 
                </div> 
                </div> 
                <div class="row mb-3"> 
                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label> 
                <div class="col-sm-3"> 
                    <input type="text" placeholder="Please, provide weight" class="form-control required" id="width" name="attributes[dimension][width]"> 
                </div>  
                </div> 
                <div class="row mb-3"> 
                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label> 
                <div class="col-sm-3"> 
                    <input type="text" placeholder="Please, provide length" class="form-control required" id="length" name="attributes[dimension][length]"> 
                </div> 
                </div> 
                <div class="row mb-3"> *Product Description*</div> 
            </div>               
            <div id="Book" v-if="selectedOption === 'Book'"> 
                <div class="row mb-3"> 
                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label> 
                <div class="col-sm-3"> 
                    <input type="text" placeholder="Please, provide weight" class="form-control required" id="weight" name="attributes[weight]"> 
                </div> 
                </div> 
                <div id="DVD" class="row mb-3"> *Product Description*</div> 
            </div>         
        </div> 
      <div class="col-sm-4 mt-4"></div> 
     </div>         
    </form> 
    </div> 

 <script>
    const app = new Vue({
        el: '#app',
        data: {
            selectedOption: 'Dvd',
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
                    {name: 'name', regex: /^[a-zA-Z0-9 ]{3,30}$/},
                    {name: 'sku', regex: /^[a-zA-Z0-9\-]{3,30}$/},
                    {name: 'price', regex: /^[0-9]{1,10}$/},
                    {name: 'attributes[size]', regex: /^[0-9]{1,10}$/},
                    {name: 'attributes[dimension][height]', regex: /^[0-9]{1,10}$/},
                    {name: 'attributes[dimension][width]', regex: /^[0-9]{1,10}$/},
                    {name: 'attributes[dimension][length]', regex: /^[0-9]{1,10}$/},
                    {name: 'attributes[weight]', regex: /^[0-9]{1,10}$/},
                ];
                this.$el.querySelectorAll(".required").forEach(function (item) {
                    let re = fieldsRegex.find(x => x.name == item.attributes.name.value);
                    if(isValid == true) {
                        if(item.value == '') {
                            alert('Please, submit required data for ' + item.attributes.name.value );
                            isValid = false;
                        }else if(re != undefined && !re.regex.test(item.value)){
                            isValid = false;
                            alert('provide the data of indicated type for ' + item.attributes.id.value );
                        }
                    }
                });
                return isValid;
            }
        }
    })
</script> 
