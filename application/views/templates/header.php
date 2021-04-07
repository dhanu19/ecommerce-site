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

    <!--Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>

<!-- HEADER -->
    <header id="menu" class="position-top">
        <!-- NAVIGATION BAR -->
        <nav class="navigation-style navbar navbar-expand-lg navbar-dark navbar-style">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <a class="navbar-brand" href="/ecommerce-site">FASHIONISTA.com</a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link " href="<?php echo base_url(); ?>pages/about">About</a></li>
                    </ul>
                    <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                
                <ul class="nav navbar-nav navbar-right">
                    <!-- This is for before login -->
                    <li><a style="margin-left: 10px" href="<?php echo base_url(); ?>customers/login">Login</a></li>
                    <li><a style="margin-left: 10px" href="<?php echo base_url(); ?>customers/register">Register</a></li>
                

                    <!-- This is for after login -->
                    <!--
                    <li><a style="margin-left: 10px" href="<?php #echo base_url(); ?>/cart">Cart</a></li>
                    <li><a style="margin-left: 10px" href="<?php #echo base_url(); ?>customers/logout">Logout</a></li> -->
                    
                </ul>
            </div>
        </nav>
        <!-- NAVIGATION BAR end -->
    </header>
  <!-- HEADER END-->

<main class="container-fluid"><!-- This main ends in footer --> 
    

            