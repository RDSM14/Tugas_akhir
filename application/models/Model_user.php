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
    
    function save() {
        $data = array(
            'email'      => $this->input->post('email', TRUE),
            'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),
            'telepon_admin'     => $this->input->post('telepon', TRUE),
            'id_sekolah' => $_SESSION['id_sekolah'],
            'password'   => md5($this->input->post('password', TRUE))
        );
        $this->db->insert('tbl_admin',$data);
    }
    
    function update() {
        $data = array( 
            'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),
            'telepon_admin'     => $this->input->post('telepon', TRUE)
        );
        $email  = $this->input->post('email', TRUE);
        $this->db->where('email',$email);
        $this->db->update('tbl_admin',$data);
    }
}
