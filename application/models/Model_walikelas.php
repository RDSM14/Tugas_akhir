<?php
class Model_walikelas extends CI_Model{
    
    
    
    function setup_walikelas($idTahunAkademik){
        
        $rombel = $this->db->get('tbl_rombel');
        foreach ($rombel->result() as $row){
            $walikelas = array(
                'id_guru'           =>  '2',
                'id_tahun_akademik' =>  $idTahunAkademik,
                'id_rombel'         =>  $row->id_rombel);
            $this->db->insert('tbl_walikelas',$walikelas);
        }
    }
    function tahun_akademik()
    {
        $this->db->select("tahun_akademik,id_tahun_akademik");
        $this->db->from("tbl_tahun_akademik");
        $this->db->where("id_sekolah", $_SESSION['id_sekolah']);
        
        $query = $this->db->get();
        return $query->result();
    }
    
     function guru()
    {
        $this->db->select("username, nama_guru");
        $this->db->from("tbl_guru");
        $this->db->where("id_sekolah", $_SESSION['id_sekolah']);
        
        $query = $this->db->get();
        return $query->result();
    }
    function rombel()
    {
        $this->db->select("id_rombel, nama_rombel");
        $this->db->from("tbl_rombel");
        $this->db->where("id_sekolah", $_SESSION['id_sekolah']);
        
        $query = $this->db->get();
        return $query->result();
    }
    function save() {
        $data = array(
            'id_tahun_akademik'             => $this->input->post('ta', TRUE),
            'username_guru'                 => $this->input->post('guru', TRUE),
            'id_rombel'                     => $this->input->post('rombel', TRUE)
        );
        $this->db->insert('tbl_walikelas',$data);
    }
    
    function update() {
        $data = array(
            'id_tahun_akademik'             => $this->input->post('ta', TRUE),
            'username_guru'                 => $this->input->post('guru', TRUE),
            'id_rombel'                     => $this->input->post('rombel', TRUE)
        );
        $id_wali  = $this->input->post('id_wali');
        $this->db->where('id_walikelas',$id_wali);
        $this->db->update('tbl_walikelas',$data);
    }
    
}