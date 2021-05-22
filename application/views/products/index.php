

<!-- HOME PAGE (products display) -->


<section id="productsDisplay" class="productsDisplay" style="margin-top:30px; margin-bottom:30px;">

    <div class="container">

        <h3 class="page-heading">PRODUCTS</h3>

        <!-- List all products -->
        <div class="row" style="row-gap: 20px;" >
            <?php if(!empty($products)){ foreach($products as $row){ ?>
                <div class="col-12 col-md-6 col-lg-3 " >
                    <div class="card  h-100 " >
                        <img class="card-img-top " src="<?php echo base_url('uploads/product-images/'.$row['image']); ?>" alt="<?php echo $row["name"]; ?>">
                        <div class="card-body card-body-flex">
                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo 'Rs.'.$row["price"].' /-'; ?></h6>
                            <p class="card-text"><?php echo $row["description"]; ?></p>
                            <a href="<?php echo base_url('products/addToCart/'.$row['id']); ?>" class="btn btn-primary " style="margin-top: auto;">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php } }else{ ?>
                <p>Product(s) not found...</p>
            <?php } ?>
        </div>
    </div>
    


</section>


<?php /*
<div class="row">
    <div class="col-3 col-md-3 col-lg-3">
    <!-- Display Categories -->
    <h3>Categories</h3>
 <div class="list-group">
 <a href="category.html" class="list-group-item">All</a>
 <a href="category.html" class="list-group-item">Dresses</a>
 <a href="category.html" class="list-group-item">Jeans</a>
 <a href="category.html" class="list-group-item">T-Shirts</a>
 <a href="category.html" class="list-group-item">Shirts</a>
 <a href="category.html" class="list-group-item">Jeggings</a>
 </div>
    
    </div>
    <div class="col-9 col-md-9 col-lg-9">
    <!-- Display Products -->

    <div class="container">

        <h2>PRODUCTS</h2>

        <!-- List all products -->
        <div class="row" style="row-gap: 20px;" >
            <?php if(!empty($products)){ foreach($products as $row){ ?>
                <div class="col-12 col-md-6 col-lg-4 justify-content-center" >
                    <div class="card  h-100 " >
                        <img class="card-img-top " src="<?php echo base_url('uploads/product-images/'.$row['image']); ?>" alt="<?php echo $row["name"]; ?>">
                        <div class="card-body card-body-flex">
                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo 'Rs.'.$row["price"].' /-'; ?></h6>
                            <p class="card-text"><?php echo $row["description"]; ?></p>
                            <a href="<?php echo base_url('products/addToCart/'.$row['id']); ?>" class="btn btn-primary " style="margin-top: auto;">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php } }else{ ?>
                <p>Product(s) not found...</p>
            <?php } ?>
        </div>
    </div>


    </div>
</div>


*/?>

