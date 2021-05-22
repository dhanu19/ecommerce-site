<style>
.page-heading{
	margin:20px;
	padding:20px;
	background-color:white;
}

</style>




<section id="category" class="category">
    
	<div class="container">
		<div class="row">
            <!-- Column 1 -->
			<div class="col col-md-4 col-lg-2">
                <div >
                    <h5 class="page-heading"> Categories</h5>
                    <ul class="list-group">
                        <li><a href="<?php echo base_url(); ?>pages/categories" class="list-group-item">All</a></li>
                        <li><a href="<?php echo base_url(); ?>pages/category_dress" class="list-group-item">Dresses</a></li>
                        <li><a href="<?php echo base_url(); ?>pages/category_jeans" class="list-group-item">Jeans</a></li>
                        <li><a href="<?php echo base_url(); ?>pages/category_tops" class="list-group-item">T-Shirts</a></li>
                        <li><a href="<?php echo base_url(); ?>pages/category_shirts" class="list-group-item">Tops</a></li>
                        <li><a href="<?php echo base_url(); ?>pages/category_trousers" class="list-group-item">Trousers</a></li>
                    </ul>
                </div>
            </div>
            <!-- Column 2 -->
            <div class="col col-md-8 col-lg-10">
                <div>
                    <h3 class="page-heading">PRODUCTS</h3>
                    <!-- List all products -->
                    <div class="row" style="row-gap: 20px;" >
                        <?php if(!empty($products)){ foreach($products as $row){ ?>
                            <div class="col-12 col-md-8 col-lg-4" >
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

	</div> 

</section>




<?php /*

<div class="row">
    <div class="col-3 col-md-3 col-lg-3">
    <!-- Display Categories -->
    <h3>Categories</h3>
    <form action="">


        <div class="list-group">
        <a class="list-group-item">All</a>
        <a  class="list-group-item">Dresses</a>
        <a  class="list-group-item">Jeans</a>
        <a href="category.html" class="list-group-item">T-Shirts</a>
        <a href="category.html" class="list-group-item">Shirts</a>
        <a href="category.html" class="list-group-item">Jeggings</a>
        </div>
        </form>
    </div>
    <div class="col-9 col-md-9 col-lg-9">
    <!-- Display Products -->

    <div class="container">

        <h2>PRODUCTS</h2>

        <!-- List all products -->
        <div class="row" style="row-gap: 20px;" >
            <?php if(!empty($products)){ foreach($products as $row){ ?>
                <div class="col-12 col-md-6 col-lg-4" >
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


*/ ?>