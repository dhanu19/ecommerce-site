<!-- Include jQuery library -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

<script>
// Update item quantity
function updateCartItem(obj, rowid){
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>

<h1>SHOPPING CART</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th width="10%"></th>
            <th width="30%">Product</th>
            <th width="15%">Price</th>
            <th width="13%">Quantity</th>
            <th width="20%" class="text-right">Subtotal</th>
            <th width="12%"></th>
        </tr>
    </thead>
    <tbody>
        <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
             <tr>
                 <td>
                     <?php $imageURL = !empty($item["image"])?base_url('uploads/product-images/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                     <img src="<?php echo $imageURL; ?>" width="50"/>
                 </td>
                 <td><?php echo $item["name"]; ?></td>
                 <td><?php echo '$'.$item["price"].' USD'; ?></td>
                 <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')"></td>
                 <td class="text-right"><?php echo 'Rs.'.$item["subtotal"].' /-'; ?></td>
                 <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('cart/removeItem/'.$item['rowid']); ?>':false;"><i class="itrash"></i> </button> </td>
             </tr>
          <?php } }else{ ?>
             <tr>
               <td colspan="6"><p>Your cart is empty.....</p></td>
               <?php } ?>
               <?php if($this->cart->total_items() > 0){ ?>
             <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td><strong>Cart Total</strong></td>
                 <td class="text-right"><strong><?php echo 'Rs.'.$this->cart->total().' /-'; ?></strong></td>
                 <td></td>
             </tr>
          <?php } ?>
          <?php if($this->cart->total_items() > 0){ ?>
           <tr>
               <td></td>
               <td></td>
               <td></td>
               <td><strong>Cart Total</strong></td>
               <td class="text-right"><strong><?php echo 'Rs.'.$this->cart->total().'/-'; ?></strong></td>
               <td></td>
           </tr>
          <?php } ?>
    </tbody>
</table>

<div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="<?php echo base_url('products/index');?>" class="btn btn-block btn-light"> Continue Shopping </a> <!--pages/view goes to home page -->
                        </div>
                        <div class="col-sm-12 col-md-l text-right">
                            <?php if($this->cart->total_items()>0) {?>
                                <a href="<?php echo base_url('checkout/index');?>" class="btn btn-block btn-primary"> Checkout </a>
                            <?php } ?>
                        </div>
                    </div>

                </div>