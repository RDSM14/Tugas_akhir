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
            'min_d'         => $this->input->post('min_d', TRUE),
            'id_sekolah'    => $_SESSION['id_sekolah']
            
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
            'min_d'         => $this->input->post('min_d', TRUE),
            'id_sekolah'    => $_SESSION['id_sekolah']
            
        );
        $id_mapel   = $this->input->post('id_mapel');
        $this->db->where('id_mapel',$id_mapel);
        $this->db->update($this->table,$data);
    }
    
    function komponen_jenis_nilai()
    {
         $this->db->select('a.id_jenis_nilai,a.nama_jenis_nilai');
        $this->db->from('tbl_jenis_nilai a'); 
        $query = $this->db->get();
        return $query->result();
    }
    
    function save_komponen() {
        $data = array(
            'nama_komponen'      => $this->input->post('nama_komponen', TRUE),
            'id_jenis_nilai'    => $this->input->post('jenis_nilai', TRUE),
            'id_mapel'         => $this->input->post('id_mapel', TRUE)
            
        );
        $this->db->insert('tbl_komponen_nilai',$data);
    }
    function ubah_komponen() {
        $data = array(
            'nama_komponen'      => $this->input->post('nama_komponen', TRUE),
            'id_jenis_nilai'    => $this->input->post('jenis_nilai', TRUE),
            'id_mapel'         => $this->input->post('id_mapel', TRUE)
            
        );
        $id     = $this->input->post('id_komponen');
        $this->db->where('id_komponen',$id);
        $this->db->update('tbl_komponen_nilai',$data);
    }
    function nilai_edit_komponen($id_komponen){
         $this->db->select('a.id_komponen,a.nama_komponen,a.id_jenis_nilai,a.id_mapel');
            $this->db->from('tbl_komponen_nilai a'); 
            $this->db->where('a.id_komponen',$id_komponen);
            $query = $this->db->get(); 
            return $query->result();
    }
        

}