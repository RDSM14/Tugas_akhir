<?php

class Model_tu extends CI_Model {

    public $table ="tbl_tu";
    
    function save() {
        $data = array(
            'username'      => $this->input->post('email', TRUE),
            'nip'      => $this->input->post('nip', TRUE),
            'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),
            'telepon_TU'     => $this->input->post('telepon_TU', TRUE),
            'id_sekolah' => $_SESSION['id_sekolah'],
            'password'   => md5($this->input->post('password', TRUE))
        );
        $this->db->insert($this->table,$data);
    }
    
    function chekemailtu($email){
        $this->db->where('email',$email);
        $user = $this->db->get('tbl_tu')->row_array();
        return $user;
    }
    
    function update() {
        $data = array(
            'username'      => $this->input->post('email', TRUE),
            'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),
            'id_sekolah' => $_SESSION['id_sekolah'],
            'telepon_TU'     => $this->input->post('telepon_TU', TRUE)
        );
        $nip   = $this->input->post('nip');
        $this->db->where('nip',$nip);
        $this->db->update($this->table,$data);
    }
}