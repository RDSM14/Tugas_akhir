<?php

class Model_guru extends CI_Model {

    public $table ="tbl_guru";
    
    function save() {
        $data = array(
            'username'      => $this->input->post('username', TRUE),
            'nuptk'      => $this->input->post('nuptk', TRUE),
            'nama_guru'  => $this->input->post('nama_guru', TRUE),
            'gender'     => $this->input->post('gender', TRUE),
            'id_sekolah' => $_SESSION['id_sekolah'],
            'password'   => md5($this->input->post('password', TRUE))
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'nuptk'      => $this->input->post('nuptk', TRUE),
            'nama_guru'  => $this->input->post('nama_guru', TRUE),
            'id_sekolah' => $_SESSION['id_sekolah'],
            'gender'     => $this->input->post('gender', TRUE)
        );
        $username   = $this->input->post('username');
        $this->db->where('username',$username);
        $this->db->update($this->table,$data);
    }
    
    function chekLogin($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tbl_guru')->row_array();
        return $user;
    }
    function chekwali($loginGuruwali){
        $this->db->where('username_guru',$loginGuruwali);
        $user = $this->db->get('tbl_walikelas')->row_array();
        return $user;
    }
}