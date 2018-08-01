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
        $id_mapel = $this->input->post('id_mapel');
        $nama_komponen = $this->input->post('nama_komponen');
        $jenis_nilai = $this->input->post('jenis_nilai');
        $porsi = $this->input->post('porsi');

        $query = $this->db->query("SELECT sum(porsi) as subtotal FROM tbl_komponen_nilai WHERE id_jenis_nilai = '$jenis_nilai' AND id_mapel = '$id_mapel'");
        $subtotal = $query->row()->subtotal;
        $total = $subtotal + $porsi;
        $hasil = "";
        $message = "";
        if( $total > 100){
            $hasil = $total;
            $message = "Insert GAGAL !! Proporsi nilai sudah lebih dari 100%";
        } else {
            $query = $this->db->query("INSERT INTO tbl_komponen_nilai (nama_komponen,id_jenis_nilai,id_mapel,porsi) VALUES('$nama_komponen','$jenis_nilai','$id_mapel','$porsi') ");
            if($query){
                $hasil = true;
                $message = "Tambah komponen nilai berhasil.";
            } else {
                $hasil = $query->result();
                $message = "Insert gagal";
            }
        }
        echo json_encode(['hasil'=>$hasil,'message'=>$message]);
    }
    function ubah_komponen() {
            $mapel = $this->input->post('id_mapel', TRUE);
            $jenis_nilai = $this->input->post('jenis_nilai', TRUE);
            $this->db->select_sum('porsi');
            $this->db->from('tbl_komponen_nilai'); 
            $this->db->where('id_mapel', $mapel);
            $this->db->where('id_jenis_nilai', $jenis_nilai);
            $query = $this->db->get();
            $result = $query->result();
            //$total_porsi = $result->porsi;
            $total = 0;  
            foreach($result as $row){
                $total = $total + $row->porsi;  
            }
            
            if(is_numeric($total)){
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
                    $this->db->update('tbl_komponen_nilai',$data);
                    $this->session->set_flashdata('data_komponen_change', 'Data Telah Diubah');
                }
            }
            
                    

    }
    function nilai_edit_komponen($id_komponen){
         $this->db->select('a.id_komponen,a.nama_komponen,a.id_jenis_nilai,a.id_mapel,a.porsi');
            $this->db->from('tbl_komponen_nilai a'); 
            $this->db->where('a.id_komponen',$id_komponen);
            $query = $this->db->get(); 
            return $query->result();
    }
        

}