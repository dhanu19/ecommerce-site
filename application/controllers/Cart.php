<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('product');
    }
    
    function index(){
        
        /* if logged in */
        if($this->session->userdata('logged_in')): {
            $data = array();
            
            // Retrieve cart data from the session
            $data['cartItems'] = $this->cart->contents();
            
            // Load the cart view
            $this->load->view('templates/header');
            $this->load->view('cart/index', $data);
            $this->load->view('templates/footer');
        }endif;

        /*not logged in*/
        if(!$this->session->userdata('logged_in')): {
            redirect('authentication/login');
        }endif;
        
    }
    
    function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }
    
    function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
        redirect('cart/');
    }
    
}
