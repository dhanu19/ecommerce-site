<!--SECTION = CAROUSAL START -->
<section id="1" class="ecomm-carousal">
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active img-fluid ">
            <img src="https://i.pinimg.com/originals/02/cf/cf/02cfcffac595c832c514d58704cd82ce.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>First slide label</h5> 
                <p>Some representative placeholder content for the first slide.</p> -->
            </div>
            </div>
            <div class="carousel-item img-fluid">
            <img src="https://i.pinimg.com/originals/ce/7d/24/ce7d24ecbd3eb25221795be24a3ac7bb.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!--<h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p> -->
            </div>
            </div>
            <div class="carousel-item img-fluid">
            <img src="http://www.theparadeswindon.co.uk/wp-content/uploads/2018/09/BW4579-The-Parade-Autumn-Winter-Web-Banner-1140x527px.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p> -->
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- CAROUSAL END -->


<!-- SECTION = PRODUCTS DISPLAY HOME PAGE -->
<section class="productsDisplay container">
    <h2>PRODUCTS</h2>

        <!-- Cart basket -->
        <div class="cart-view">
            <a href="<?php echo base_url('cart'); ?>" title="View Cart"><i class="icart"></i> (<?php echo ($this->cart->total_items() > 0)?$this->cart->total_items().' Items':'Empty'; ?>)</a>
        </div>
        
        <!-- List all products -->
        <div class="row col-lg-12">
            <?php if(!empty($products)){ foreach($products as $row){ ?>
                <div class="card col-lg-3">
                    <img class="card-img-top" src="<?php echo base_url('uploads/product_images/'.$row['image']); ?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo '$'.$row["price"].' USD'; ?></h6>
                        <p class="card-text"><?php echo $row["description"]; ?></p>
                        <a href="<?php echo base_url('products/addToCart/'.$row['id']); ?>" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            <?php } }else{ ?>
                <p>Product(s) not found...</p>
            <?php } ?>
        </div>
</section>
