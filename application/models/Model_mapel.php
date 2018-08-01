<?php

class Model_mapel extends CI_Model {

    public $table ="tbl_mapel";
    
    function save() {
        $data = array(
            'id_mapel'      => $this->input->post('id_mapel', TRUE),
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
            'id_mapel'    => $this->input->post('id_mapel', TRUE),
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
             $mapel = $this->input->post('id_mapel', TRUE);
            $this->db->select('porsi');
            $this->db->from('tbl_komponen_nilai'); 
            $this->db->where('id_mapel', $mapel);
            $query = $this->db->get();
            $result = $query->row();
            //$id_rombel = $result->id_rombel;
            for ($i=0; $i<count($result); $i++){
                $total = $result[i]+ result[i+1];    
            }
            $porsi_baru = $this->input->post('porsi', TRUE);
            $hasil = $porsi_baru + $total;

            if ($hasil > 100){
                $this->session->set_flashdata('data_komponen_change_gagal', 'Data Telah Diubah');
            }
            else{
                $data = array(
                'nama_komponen'     => $this->input->post('nama_komponen', TRUE),
                'id_jenis_nilai'    => $this->input->post('jenis_nilai', TRUE),
                'porsi'             => $this->input->post('porsi', TRUE),
                'id_mapel'          => $this->input->post('id_mapel', TRUE)

            );
                $id     = $this->input->post('id_komponen');
                $this->db->where('id_komponen',$id);
                //$this->db->update('tbl_komponen_nilai',$data);
                $this->session->set_flashdata('data_komponen_change', 'Data Telah Diubah');
            } 

    }
    function nilai_edit_komponen($id_komponen){
         $this->db->select('a.id_komponen,a.nama_komponen,a.id_jenis_nilai,a.id_mapel');
            $this->db->from('tbl_komponen_nilai a'); 
            $this->db->where('a.id_komponen',$id_komponen);
            $query = $this->db->get(); 
            return $query->result();
    }
        

}