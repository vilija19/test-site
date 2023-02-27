<div class="row align-items-center">
       <div class="col-sm-10"><h1><?php echo $title; ?></h1></div> 
       <div class="col-sm-2"> 
           <a href="/add-product" role="button" class="btn btn-primary">ADD</a> 
           <button type="button"  @click="submit" id="delete-product-btn" class="btn btn-danger">MASS DELETE</button> 
       </div> 
   </div> 
   <form id="products_form" method="POST" action="/delete" novalidate> 
   <div class="row border-top"> 
        <?php foreach ($products as $product) { ?>
           <div class="col-sm-2 border mt-4 pb-5"> 
               <div class="row align-items-center"><div class="col"> 
                   <input class="form-check-input delete-checkbox" name="selected-products[]" type="checkbox" value="<?php echo $product->id; ?>"> 
               </div></div> 
               <div class="row"><div class="col text-center"><?php echo $product->sku; ?></div></div> 
               <div class="row"><div class="col text-center"><?php echo $product->name; ?></div></div> 
               <div class="row"><div class="col text-center"><?php echo $product->price; ?> $</div></div> 
               <?php foreach ($product->attributes as $attribute) { ?>
                    <div class="row"><div class="col text-center"> 
                        <?php echo $attribute->name . ': ' . $attribute->value . ' ' . $attribute->attribute->value_unit;  ?>
                    </div></div> 
               <?php } ?>
           </div> 
        <?php } ?>
   </div> 
   </form> 
 </div> 
 <script>
    const app = new Vue({
        el: '#app',
        methods: {
            submit: function (event) {
                this.$el.querySelector("#products_form").submit();
            }
        }
    })
</script> 
