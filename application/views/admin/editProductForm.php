<div class="container">
    <div>
        <h3>Edit/Update Product</h3>
    </div>
    <div>
        <form action="<?php echo base_url().'Admin/updateProduct/'.$product['id']; ?>" method="post" name="update">
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $product['name']?>">
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
            <input type="number" name="price" id="price" value="<?php echo $product['price']?>">
            <br>
            <br>

            <label for="description">Product Description:</label>
            <input type="text" name="description" id="description" value="<?php echo $product['description']?>">
            <br>
            <br>


            <label for="quantity">Product Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="<?php echo $product['quantity']?>">
            <br>
            <br>

            <label for="image">Product Image:</label>
            <input type="text" name="image" id="quantity" value="<?php echo $product['image']?>">
            <br>
            <br>
            
            <input type = "submit" value="Update">
        </form>

    </div>
</div>






