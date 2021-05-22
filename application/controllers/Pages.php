<?php

class Pages extends CI_Controller{

    function  __construct(){
        parent::__construct();
        $this->load->model('product');
    }

    public function index(){
        //for other pages
    }

    public function categories(){

        $data = array();
        // Fetch products from the database
        $data['products'] = $this->product->getRows();
        
        $this->load->view('templates/header');
        $this->load->view('pages/categories',$data);
        $this->load->view('templates/footer');
    }

    public function about(){
        
        $this->load->view('templates/header');
        $this->load->view('pages/about');
        $this->load->view('templates/footer');
    }
    public function contactus(){
        $this->load->view('templates/header');
        $this->load->view('pages/contactus');
        $this->load->view('templates/footer');
    }

    /************  CATEGORIES **************/
    // dress
    public function category_dress(){

        $data = array();
        // Fetch products from the database
        $data['dresses'] = $this->product->getDress();


        $this->load->view('templates/header');
        $this->load->view('pages/category_dress',$data);
        $this->load->view('templates/footer');
    }
    // jeans
    public function category_jeans(){
        
        $data = array();
        // Fetch products from the database
        $data['jeans'] = $this->product->getJeans();

        $this->load->view('templates/header');
        $this->load->view('pages/category_jeans',$data);
        $this->load->view('templates/footer');
    }
    // jeggings
    public function category_trousers(){

        $data = array();
        // Fetch products from the database
        $data['trousers'] = $this->product->getTrousers();

        $this->load->view('templates/header');
        $this->load->view('pages/category_trousers',$data);
        $this->load->view('templates/footer');
    }
    // shirts
    public function category_tops(){

        $data = array();
        // Fetch products from the database
        $data['tops'] = $this->product->getTops();

        $this->load->view('templates/header');
        $this->load->view('pages/category_tops',$data);
        $this->load->view('templates/footer');
    }
    // tshirts
    public function category_tshirts(){

        $data = array();
        // Fetch products from the database
        $data['tshirts'] = $this->product->getTshirts();

        $this->load->view('templates/header');
        $this->load->view('pages/category_tshirts',$data);
        $this->load->view('templates/footer');
    }
    

}
?>