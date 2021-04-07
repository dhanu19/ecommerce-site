<div class="container">
    <div>
        <h3>Add Product</h3>
    </div>
    <div>
        <form action="<?php echo base_url(); ?>admin/addProduct/" method="post">
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name">
            <br>
            <br>

            Product Category: &nbsp; &nbsp;
            <input type="radio" id="tops" name="category" value="tops">
            <label for="tops">Tops</label> &nbsp; &nbsp;
            <input type="radio" id="dress" name="category" value="dress">
            <label for="dress">Dress</label> &nbsp; &nbsp;
            <input type="radio" id="jeans" name="category" value="jeans">
            <label for="jeans">Jeans</label> &nbsp; &nbsp;
            <input type="radio" id="tshirt" name="category" value="tshirt">
            <label for="tshirt">T-shirt</label> &nbsp; &nbsp;
            <input type="radio" id="trousers" name="category" value="trousers">
            <label for="trousers">Trousers</label> &nbsp; &nbsp;
            <br>
            <br>

            <label for="price">Product Price:</label>
            <input type="number" name="price" id="price">
            <br>
            <br>
            
            <label for="description">Product Description:</label>
            <input type="text" name="description" id="description">
            <br>
            <br>


            <label for="quantity">Product Quantity:</label>
            <input type="number" name="quantity" id="quantity">
            <br>
            <br>
            <!--
            <label for="productImage">Product Image:</label>
            <input type="image" src="<?php /*echo base_url(); */?>/uploads/product_imgs/img1.jpg" name="productImage" id="productImage">
            <br>
            <br>-->
            <input type = "submit" value="Add">
            
        </form>
    </div>
    
</div>



