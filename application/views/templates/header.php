<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASHIONISTA.com</title>
    <!-- BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    <!-- Latest compiled and minified CSS -->
    <!-- BOOTSTRAP CDN END-->

    <!-- Google Icons Stylesheet -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <!-- Google Font Family-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&family=Righteous&display=swap" rel="stylesheet">
    <!--Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css">

    


    

</head>
<body>
<div>

<!-- HEADER -->
    <header id="menu" class="position-top">
        <!-- NAVIGATION BAR -->
        <nav id="header_nav" class="navigation-style  fixed-top navbar navbar-expand-lg navbar-dark ">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <span><a class="navbar-brand" href="/ecommerce-site"><img src="<?php echo base_url(); ?>uploads/logo/Sketch002.jpg" style='max-width:150px'></img></a></span>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link " aria-current="page" href="<?php echo base_url().'Products/index'; ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link " href="<?php echo base_url(); ?>pages/categories">Categories</a></li>
                        <li class="nav-item"><a class="nav-link " href="<?php echo base_url(); ?>pages/about">About</a></li>
                        <li class="nav-item"><a class="nav-link " href="<?php echo base_url(); ?>pages/contactus">Contact Us</a></li>
                        
                        <?php if($this->session->userdata('logged_in')): ?>
                            <li class="nav-item"><a class="nav-link " href="<?php echo base_url(); ?>users/index">Profile</a></li>
                        <?php endif;?>
                    </ul>

                    <!-- SEARCH TEXT --><?php /*
                    <form class="d-flex">
                        <input class="form-control me-2" id="search_category" name="search_category" type="search_category" placeholder="Search Categories" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    */?>
                    
                </div>
                <ul class="nav d-flex align-items-center">
                    
                    <!-- This is for before login -->
                    <?php if(!$this->session->userdata('logged_in')): ?>
                        <li class="nav-item"><a style="margin-left: 10px" href="<?php echo base_url(); ?>authentication/login">Login</a></li>
                        <li class="nav-item"><a style="margin-left: 10px" href="<?php echo base_url(); ?>authentication/register">Register</a></li>
                    <?php endif;?>

                    <!-- This is for after login -->
                    <?php if($this->session->userdata('logged_in')): ?>
                        <li class="nav-item" style="padding:5px;"><?php echo '<b>Hello, '.$_SESSION['username'].'</b>';?></li>
                        <li class="nav-item" style="padding:5px;"><div class="cart-view"><a style="text-decoration:none;" href="<?php echo base_url('cart'); ?>" title="View Cart"><?php echo ($this->cart->total_items() > 0)?$this->cart->total_items().' Items':'Empty'; ?><span class="material-icons" style="font-size:20px;">shopping_cart</span></a></div></li>
                        <li class="nav-item" style="padding:5px;"><a href="<?php echo base_url(); ?>authentication/logout">Logout</a></li> 
                    <?php endif;?>
                </ul>
            </div>
        </nav>
        <!-- NAVIGATION BAR end -->
    </header>
  <!-- HEADER END-->


<main ><!-- This main ends in footer --> 
<div style="padding-bottom:30px;"><!-- This div ends in footer-->

            