<?php

class Auth_model extends CI_Model{

    public function register($enc_password){
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,

        );

        //INSERT USERS

        return $this->db->insert('customers',$data);
    }



    //log user in
    public function login($username,$password){
        //validate
        $this->db->where('username',$username);
        $this->db->where('password',$password);

        $result = $this->db->get('customers');

        if($result->num_rows() == 1){
            return $result->row(0)->id;
        }else false;
    }

    

     
}






?>