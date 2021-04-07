<?php


class Admin_model extends CI_Model{
    
    function __construct() {
        /* This is Admin model */
    }

    public function displayProducts(){
        //display for index
        return $products = $this->db->get('products')->result_array();
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
    
}