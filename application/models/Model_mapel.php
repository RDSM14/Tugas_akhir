<?php

class Model_mapel extends CI_Model {

    public $table ="tbl_mapel";
    
    function save() {
        $data = array(
            'kd_mapel'      => $this->input->post('kd_mapel', TRUE),
            'nama_mapel'    => $this->input->post('nama_mapel', TRUE),
            'min_a'         => $this->input->post('min_a', TRUE),
            'min_b'         => $this->input->post('min_b', TRUE),
            'min_c'         => $this->input->post('min_c', TRUE),
            'min_d'         => $this->input->post('min_d', TRUE)
            
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'kd_mapel'    => $this->input->post('kd_mapel', TRUE),
            'nama_mapel'    => $this->input->post('nama_mapel', TRUE),
            'min_a'         => $this->input->post('min_a', TRUE),
            'min_b'         => $this->input->post('min_b', TRUE),
            'min_c'         => $this->input->post('min_c', TRUE),
            'min_d'         => $this->input->post('min_d', TRUE)
        );
        $id_mapel   = $this->input->post('id_mapel');
        $this->db->where('id_mapel',$id_mapel);
        $this->db->update($this->table,$data);
    }

}