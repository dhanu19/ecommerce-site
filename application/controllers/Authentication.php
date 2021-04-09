<?php

class Authentication extends CI_Controller{
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load authentication model
        $this->load->model('Auth_model');

        $this->load->helper('form');
        //load form_validation library
        $this->load->library('form_validation');


    }
    
        public function register(){
            $data['title'] = 'Register';
    
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('phone','Phone','required');
            $this->form_validation->set_rules('address','Addresss','required');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','matches[password]');
            
    
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('auth/register',$data);
                $this->load->view('templates/footer');
    
            }else{
                //Encrypt password
                $enc_password = md5($this->input->post('password'));
                
                $this->Auth_model->register($enc_password);
                
                $this->session->set_flashdata('user_registered','You are now registered and can log in');
                #redirect('products/index');
                redirect('authentication/login');
            }
        }

    public function login(){
        $data['title'] = 'Log In';

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('auth/login',$data);
            $this->load->view('templates/footer');

        }else{
            //get username
            $username = $this->input->post('username');
            //get and encrypt password
            $password = md5($this->input->post('password'));

            //login user
            $customer_id = $this->Auth_model->login($username,$password);
            
            if($customer_id){//this customer id is return from login() function in customer_model
                
                //create session
                $customer_data = array(
                    'customer_id' => $customer_id,
                    'username' => $username,
                    'logged_in' =>true
                );


                $this->session->set_userdata($customer_data);
                //set message
                $this->session->set_flashdata('customer_loggedin','You are now logged in ');
                redirect('Products/index');
            }else{
                //set message
                $this->session->set_flashdata('login_failed','login is invalid');
                redirect('authentication/login');
            }

            
        }
    }

    //logout
    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();


        //message
        $this->session->set_flashdata('customer_loggedout','You are now logged out ');
        
        redirect('authentication/login'); 
    }

    
}
?>
