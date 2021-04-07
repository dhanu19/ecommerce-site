<?php

class Admin extends CI_COntroller{

    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('Admin_model');
    }

    public function index(){

        //display products
        $products = $this->Admin_model->displayProducts();
        $data = array();
        $data['products'] = $products;

        $this->load->view('admin/dashboard',$data);
    }


    // ADD PRODUCT
    public function AddProductForm(){
        //load product inserting form view
        $this->load->view('admin/addProductForm');
    }

    public function addProduct(){
    
        $data = array(
             'name' => $this->input->post('name'),
             'category' => $this->input->post('category'),
             'price' => $this->input->post('price'),
             'quantity' => $this->input->post('quantity'),
             'description' => $this->input->post('description'),
             #'image' => $this->input->post('image'),
         );
     
         $this->Admin_model->addProduct($data);
         redirect(base_url()."admin/index");
     }



    // EDIT PRODUCT
    public function EditProductForm(){
        $this->load->view('admin/editProductForm');
    }

    public function editProduct($id){
        
            $product = $this->Admin_model->getProduct($id);
            $data = array();
            $data['product'] = $product;
            $this->load->view('admin/editProductForm',$data);
    }

    public function updateProduct($id){

            $product = $this->Admin_model->getProduct($id);
            $data = array();
            $data['product'] = $product;
            
            //update user record
            $updateData = array();
            $updateData['name'] = $this->input->post('name');
            $updateData['category'] = $this->input->post('category');
            $updateData['price'] = $this->input->post('price');
            $updateData['description'] = $this->input->post('description');
            $updateData['quantity'] = $this->input->post('quantity');
            /*After added*/ /*$updateData['productImage'] = $this->input->post('productImage');*/
            $this->Admin_model->updateProduct($id,$updateData);
            redirect(base_url().'Admin/index/');
    }

    public function deleteProduct($id){

        $product = $this->Admin_model->getProduct($id);
        if(empty($product)){
            redirect(base_url().'Admin/index');
        }

        $this->Admin_model->deleteProduct($id);
        redirect(base_url().'Admin/index');



    }






    

    
}

?>