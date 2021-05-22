<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model{
    
    function __construct() {
        $this->proTable = 'products';
        $this->custTable = 'customers';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
        $this->receiptTable = 'receipt'; //new
    }
    
    /*
     * Fetch products data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('status', '1');
        if($id){
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        // Return fetched data
        return !empty($result)?$result:false;
    }

    
    
    /*
     * Fetch order data from the database
     * @param id returns a single record of the specified ID
     */
    public function getOrder($id){
        $this->db->select('o.*, c.name, c.email, c.phone, c.address');
        $this->db->from($this->ordTable.' as o');
        $this->db->join($this->custTable.' as c', 'c.id = o.customer_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('i.*, p.image, p.name, p.price');
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->proTable.' as p', 'p.id = i.product_id', 'left');
        $this->db->where('i.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert customer data in the database
     * @param data array
     */
    public function insertCustomerinReceipt($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert customer data
       // $insert = $this->db->insert($this->custTable, $data);

        
       // Insert customer data
        $insert = $this->db->insert($this->receiptTable, $data);
        $data['receipt_id'] = $this->db->insert_id();

        
        // Return the status
        // return $insert?$data['customer_id']:false;
        return $insert?$data:false;
    }
    
    public function getReceipt($recID){
        $this->db->where('id', $recID);
        // here we select every column of the table
        $query = $this->db->get('receipt');
        $result = $query->result_array(); 
        //return $result;
        return !empty($result)?$result:false;
    }
    /*
     * Insert order data in the database
     * @param data array
     */
    public function insertOrder($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        //Insert order data
        $insert = $this->db->insert($this->ordTable, $data);

        


        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order items data in the database
     * @param data array
     */
    public function insertOrderItems($data = array()) {
        
        // Insert order items
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);

        // Return the status
        return $insert?true:false;
    }

    /***************** CATEGORIES ******************/

    public function getDress(){
        $this->db->where('category', 'dress' );
        return $product = $this->db->get('products')->result_array();
    }

    public function getJeans(){
        $this->db->where('category', 'jeans' );
        return $product = $this->db->get('products')->result_array();
    }

    public function getTrousers(){
        $this->db->where('category', 'trousers' );
        return $product = $this->db->get('products')->result_array();
    }

    public function getTshirts(){
        $this->db->where('category', 'tshirt' );
        return $product = $this->db->get('products')->result_array();
    }

    public function getTops(){
        $this->db->where('category', 'tops' );
        return $product = $this->db->get('products')->result_array();
    }
    
}