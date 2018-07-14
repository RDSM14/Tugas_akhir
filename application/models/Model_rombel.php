<?php

class Model_rombel extends CI_Model {

    public $table ="tbl_rombel";
    
    function save() {
        $data = array(
            
            'id_sekolah'    => $_SESSION['id_sekolah'],
            'kelas'    => $this->input->post('kelas', TRUE),
            'nama_rombel'  => $this->input->post('nama_rombel', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'id_sekolah'    => $_SESSION['id_sekolah'],
            'kelas'    => $this->input->post('kelas', TRUE),
            'nama_rombel'  => $this->input->post('nama_rombel', TRUE)
        );
        $id_rombel   = $this->input->post('id_rombel');
        $this->db->where('id_rombel',$id_rombel);
        $this->db->update($this->table,$data);
    }
    


}