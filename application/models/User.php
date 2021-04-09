<?php // USER/customer MODEL

class User extends CI_Model{
    
    function __construct() {
        /* This is Admin model */
    }

    public function getUser($id){
        $this->db->where('id',$id);
        return $user = $this->db->get('customers')->row_array();
    }

    public function updateUser($id,$data){
        $this->db->where('id',$id);
        $this->db->update('customers',$data);
    }


}

?>