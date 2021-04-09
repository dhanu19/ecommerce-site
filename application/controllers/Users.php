<?php // USERS/customers CONTROLLER


class Users extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load product model
        $this->load->model('User');
    }

    public function index(){
        //display user information
        if($this->session->userdata('logged_in')): {
            $id = $_SESSION['customer_id'];
            $user_info = $this->User->getUser($id);
            $data = array();
            $data['user'] = $user_info;
            $this->load->view('templates/header');
            $this->load->view('users/index',$data);
            $this->load->view('templates/footer');


            //display user information
            
        }endif;
    }

    public function updateUser($id){

        $user = $this->User->getUser($id);
        $data = array();
        $data['user'] = $user;
        
        //update user record
        $updateData = array();
        $updateData['name'] = $this->input->post('name');
        $updateData['email'] = $this->input->post('email');
        $updateData['phone'] = $this->input->post('phone');
        $updateData['address'] = $this->input->post('address');
        $updateData['username'] = $this->input->post('username');
        
        $this->User->updateUser($id,$updateData);
        redirect(base_url().'Users/index/');
}

}
















?>