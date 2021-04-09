<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('product');
    }

    function index(){

    
        $data = array();
        
        // Fetch products from the database
        $data['products'] = $this->product->getRows();
        
        // Load the product list view
        $this->load->view('templates/header');
        $this->load->view('products/index', $data);
        $this->load->view('templates/footer');


    }
    
    function addToCart($id){
        if($this->session->userdata('logged_in')): {
            // Fetch specific product by ID
            $product = $this->product->getRows($id);
            
            // Add product to the cart
            $data = array(
                'id'    => $product['id'],
                'qty'    => 1,
                'price'    => $product['price'],
                'name'    => $product['name'],
                'image' => $product['image']
            );
            $this->cart->insert($data);
            
            // Redirect to the cart page
            redirect('cart/');
        }endif;

        /*not logged in*/
        if(!$this->session->userdata('logged_in')): {
            redirect('authentication/login');
        }endif;

    }

    
    
}