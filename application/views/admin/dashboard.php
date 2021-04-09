<!-- ADMIN DASHBOARD - main page to display all products -->

<!-- DISPLAY PRODUCTS -->



<div class="container">
<h6>DASHBOARD</h6>

<hr>
    <div class="div">
        <h6>Products List -</h6>
        <button class="btn_addproducts"><a href="<?php echo base_url(); ?>admin/displayProducts">Open</a>
    </div>
    <br>
    <div>
        <h6>Customers List -</h6>
        <button class="btn_addproducts"><a href="<?php echo base_url(); ?>admin/displayCustomers">Open</a>
    </div>
    <br>
    <div>
        <h6>Orders List -</h6>
        <button class="btn_addproducts"><a href="<?php echo base_url(); ?>admin/displayorders">Open</a>
    </div>
</div>





<!--products list on admin dashoard -->

<!--
    <?php /*?>
<?php $count = 1;?>
<div class="container">
    <div class="container">
        <div>Add products - 
        <button class="btn_addproducts"><a href="<?php echo base_url(); ?>admin/AddProductForm">Add</a>
        <br>
        <button class="btn_addproducts"><a href="<?php echo base_url(); ?>admin/displayProducts">Products</a>
        </div>
        <hr>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Total</th>
                <th scope="col">Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($products)) {
                        foreach($products as $product){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $count++;?></th>
                                <td><?php echo $product['id']?></td>
                                <td><?php echo $product['name']?></td>
                                <td><?php echo $product['image']?></td>
                                <td><?php echo $product['quantity']?></td>
                                <td><?php echo $product['category']?></td>
                                <td><?php echo $product['description']?></td>
                                <td><?php echo $product['price']?></td>
                                <td>
                                    <a href="<?php echo base_url().'Admin/editProduct/'.$product['id'] ?>" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'Admin/deleteProduct/'.$product['id'] ?>" class="btn btn-primary">Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                            <tr>
                                <td colspan="6">Records not found </td>
                            </tr>
                        <?php }?>
            </tbody>
        </table>
        
    </div>
</div>
<?php */?>
-->
<!-- Display using if else loop-->
