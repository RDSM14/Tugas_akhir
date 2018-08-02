<?php
class Model_user extends CI_Model{
    
    function chekLoginadmin($username,$password){
        $this->db->where('email',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tbl_admin')->row_array();
        return $user;
    }
    function chekadmin($username,$password){
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
    function cariId(){
        
        $this->db->select_max("id_sekolah");
        $this->db->from("tbl_sekolah_info");
        $query = $this->db->get();
        $result = $query->row();
        return $result->id_sekolah;
        
    }
    function saveadmin($id) {
        $data = array(
            'email'      => $this->input->post('email', TRUE),
            'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),
            'telepon_admin'     => $this->input->post('no_hp', TRUE),
            'id_sekolah' => $id,
            'password'   => md5($this->input->post('password', TRUE))
        );
        $this->db->insert('tbl_admin',$data);
        
        $sekolah = array(
           'id_sekolah' => $id,
            'nama_sekolah'  => $this->input->post('school_name', TRUE),
            'id_jenjang_sekolah'     => $this->input->post('jenjang', TRUE)
        );
        $this->db->insert('tbl_sekolah_info',$sekolah);
        
        
    }
   
}
