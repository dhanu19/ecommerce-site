<style>
.page-heading{
	margin:20px;
	padding:20px;
	background-color:white;
}

</style>

<?php
/*
echo "<pre>";print_r($order);echo "</pre>";
echo "<pre>";print_r($receipt);echo "</pre>";
*/
?>

<section id="order_success" class="order_success">
	<div class="container">
		<div class="row">
			<div class="page-heading">
				<h3> Order Status</h3>
			</div>
		</div>
		<div class="row">
			<div class="col">
                
                <!-- START OF CODE IS HERE -->
                <?php if(!empty($order)){ ?>
                    
                    
                    <div class="container">
                        <!--row 2 -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success">Your order has been placed successfully. <br>Please Download Your Receipt. </div>
                            </div>
                        </div>
                        <!--row 2 -->
                        <div class="row">

                            <!--col 1 -->
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Account</h5>
                                        <?php /*
                                        <div class="card-text">Ordered items are:- 
                                            <div class="container">
                                                <div class="row">
                                                    <?php  if(!empty($order['items'])){  
                                                        foreach($order['items'] as $item)
                                                            {?>
                                                                <div class="col-8"><?php echo $item["name"]; ?></div>
                                                                <div class="col"><?php echo $item["price"]; ?></div>
                                                    <?php } }?>
                                                </div>
                                            </div>
                                        </div>
                                        */?>
                                    </div>
                                    <!-- 
                                    <div class="col">
                                    <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Receipt</h5>
                                        <div class="card-text">Ordered items are:- 
                                        <?php  /*if(!empty($order['items'])){  
                                                    foreach($order['items'] as $item)
                                                    {?>
                                                        <div>
                                                            <?php echo $item["name"]; ?>
                                                        </div>
                                                <?php } } */?>
                                        </div>
                                    </div>
                                    -->
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Order ID:</b> #<?php echo $order['id']; ?></li>
                                        <li class="list-group-item"><b>Customer ID:</b> #<?php echo $order['customer_id']; ?></li>
                                        <li class="list-group-item"><b>Buyer Name:</b> <?php echo $order['name']; ?></li>
                                        <li class="list-group-item"><b>Email:</b> <?php echo $order['email']; ?></li>
                                        <li class="list-group-item"><b>Phone:</b> <?php echo $order['phone']; ?></li>
                                        <li class="list-group-item"><b>Total:</b> <?php echo 'Rs. '.$order['grand_total'].' /-'; ?></li>
                                    </ul>
                                    <!-- 
                                    <div class="card-body">
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                                    -->
                                </div>
                                <br>
                            </div>
                            
                            <!--col 2 -->
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Receipt</h5>
                                        <div class="card-text">Ordered items are:- 
                                        <div class="container">
                                                <div class="row">
                                                    <?php  if(!empty($order['items'])){  
                                                        foreach($order['items'] as $item)
                                                            {?>
                                                                <div class="col-8"><?php echo $item["name"]; ?></div>
                                                                <div class="col"><?php echo $item["price"]; ?></div>
                                                    <?php } }?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <?php  if(!empty($receipt)){  
                                        foreach($receipt as $eachReceipt)
                                        {?>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Receipt ID:</b> #<?php echo $eachReceipt['id']; ?></li>
                                        <li class="list-group-item"><b>Customer ID:</b> #<?php echo $eachReceipt['customer_id']; ?></li>
                                        <li class="list-group-item"><b>Buyer Name:</b> <?php echo $eachReceipt['name']; ?></li>
                                        <li class="list-group-item"><b>Email:</b> <?php echo $eachReceipt['email']; ?></li>
                                        <li class="list-group-item"><b>Phone:</b> <?php echo $eachReceipt['phone']; ?></li>
                                        <li class="list-group-item"><b>Placed On:</b> <?php echo $order['created']; ?></li>
                                        <li class="list-group-item"><b>Address:</b> <?php echo $eachReceipt['address']; ?></li>
                                        <li class="list-group-item"><b>Total:</b> <?php echo 'Rs. '.$order['grand_total'].' /-'; ?></li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="#" class="card-link">Download Receipt</a>
                                        
                                    </div>
                                    <?php } }?>
                                </div>
                                <br>
                            </div>

                            <div class="col">
                                <div class="row col-lg-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>QTY</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(!empty($order['items'])){  
                                                foreach($order['items'] as $item){ 
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php $imageURL = !empty($item["image"])?base_url('uploads/product-images/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                                                    <img src="<?php echo $imageURL; ?>" width="75"/>
                                                </td>
                                                <td><?php echo $item["name"]; ?></td>
                                                <td><?php echo 'Rs. '.$item["price"].' /-'; ?></td>
                                                <td><?php echo $item["quantity"]; ?></td>
                                                <td><?php echo 'Rs. '.$item["sub_total"].' /-'; ?></td>
                                            </tr>
                                            <?php } 
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php } else{ ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">Your order submission failed.</div>
                                    </div>
                                <?php } ?>
                                <!-- END OF CODE IS HERE-->
                            </div>
                        </div>
                    </div>

                    
                    <!-- Order status & shipping info -->
                    <?php /*
                    <div class="row col-lg-12 ord-addr-info">
                        <div class="hdr">Order Info</div>
                        <p><b>Reference ID:</b> #<?php echo $order['id']; ?></p>
                        <p><b>Total:</b> <?php echo 'Rs. '.$order['grand_total'].' /-'; ?></p>
                        <p><b>Placed On:</b> <?php echo $order['created']; ?></p>
                        <p><b>Buyer Name:</b> <?php echo $order['name']; ?></p>
                        <p><b>Email:</b> <?php echo $order['email']; ?></p>
                        <p><b>Phone:</b> <?php echo $order['phone']; ?></p>
                        
                    </div>
                    */?>
                    

			</div>
		</div>
	</div> 

</section>


