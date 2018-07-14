<?php

class Model_sekolah extends CI_Model {

    public $table = 'tbl_sekolah_info';
    
    function update() {
        $data = array(
            'nama_sekolah'          => $this->input->post('nama_sekolah', TRUE),
            'alamat_sekolah'        => $this->input->post('alamat_sekolah', TRUE),
            'email'                 => $this->input->post('email', TRUE),
            'telpon'                => $this->input->post('telpon', TRUE),
            'id_jenjang_sekolah'    => $this->input->post('jenjang', TRUE),
            'nilai_max'             => $this->input->post('nilai_max', TRUE),
            'nilai_min'             => $this->input->post('nilai_min', TRUE),
            'min_a'                 => $this->input->post('min_a', TRUE),
            'min_b'                 => $this->input->post('min_b', TRUE),
            'min_c'                 => $this->input->post('min_c', TRUE),
            'min_d'                 => $this->input->post('min_d', TRUE)
        );
        
        $id_skeolah = $this->input->post('id_sekolah');
        $this->db->where('id_sekolah', $id_skeolah);
        $this->db->update($this->table, $data);
        
        
    }

}