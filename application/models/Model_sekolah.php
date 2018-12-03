<?php

class Model_sekolah extends CI_Model {

    public $table = 'tbl_sekolah_info';
    
    function update($logo) {
        
        if(empty($foto)){ //without foto
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
            'min_d'                 => $this->input->post('min_d', TRUE),
            'min_aplus'                 => $this->input->post('min_aplus', TRUE),
            'min_bplus'                 => $this->input->post('min_bplus', TRUE),
            'min_cplus'                 => $this->input->post('min_cplus', TRUE),
            'min_dplus'                 => $this->input->post('min_dplus', TRUE),
            'min_amin'                 => $this->input->post('min_amin', TRUE),
            'min_bmin'                 => $this->input->post('min_bmin', TRUE),
            'min_cmin'                 => $this->input->post('min_cmin', TRUE),
            'min_dmin'                 => $this->input->post('min_dmin', TRUE)
        );
        }
        else//with foto
        {
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
            'min_d'                 => $this->input->post('min_d', TRUE),
            'min_aplus'             => $this->input->post('min_aplus', TRUE),
            'min_bplus'             => $this->input->post('min_bplus', TRUE),
            'min_cplus'             => $this->input->post('min_cplus', TRUE),
            'min_dplus'             => $this->input->post('min_dplus', TRUE),
            'min_amin'              => $this->input->post('min_amin', TRUE),
            'min_bmin'              => $this->input->post('min_bmin', TRUE),
            'min_cmin'              => $this->input->post('min_cmin', TRUE),
            'min_dmin'              => $this->input->post('min_dmin', TRUE),
            'foto'                  => $logo
         );    
        }
        $id_skeolah = $this->input->post('id_sekolah');
        $this->db->where('id_sekolah', $id_skeolah);
        $this->db->update($this->table, $data);
        
        
    }

}