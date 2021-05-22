<?php


class Admin_model extends CI_Model{
    
    function __construct() {
        /* This is Admin model */
    }
    
    public function displayProducts(){
        //display for index
        return $products = $this->db->get('products')->result_array();
    }

    public function display_category($cat){
        //display tshirts for download
        $this->db->where('category',$cat);
        return $product = $this->db->get('products')->result_array();
    }
    

    public function addProduct($data){
        $this->db->insert('products',$data);
    }

    public function getProduct($id){
        $this->db->where('id',$id);
        return $product = $this->db->get('products')->row_array();
    }

    public function updateProduct($id,$data){
        $this->db->where('id',$id);
        $this->db->update('products',$data);
    }
    
    public function deleteProduct($id){
        $this->db->where('id',$id);
        $this->db->delete('products');
    }


    //CUSTOMERS
    public function displayCustomers(){
        //display for index
        return $customers = $this->db->get('customers')->result_array();
    }

    //orders
    public function display_orders(){
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_items', 'orders.id = order_items.order_id');
        $query = $this->db->get();  
        $result = $query->result_array();
        return $result;
        //return $orders = $this->db->get('orders')->result_array();
    }

    public function display_orderItems(){
        return $orderItems = $this->db->get('order_items')->result_array();
    }
    
}