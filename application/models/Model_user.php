<?php
class Model_user extends CI_Model{
    
    function chekLoginadmin($username,$password){
        $this->db->where('email',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tbl_admin')->row_array();
        return $user;
    }
    function chekLoginTU($username,$password){
        $this->db->where('nip',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tbl_tu')->row_array();
        return $user;
    }
    
}
