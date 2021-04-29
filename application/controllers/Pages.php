<?php

class Pages extends CI_Controller{

    function  __construct(){
        parent::__construct();
        
    }

    public function index(){
        //for other pages
    }

    public function categories(){
        
        $this->load->view('templates/header');
        $this->load->view('pages/categories');
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
}
?>