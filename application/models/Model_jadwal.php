<?php
class Model_jadwal extends CI_Model{
    
    function getJamPelajaran(){
        $jam_pelajaran = array(
            '07.15 - 08.00' =>'07.15 - 08.00',
            '08.00 - 08.45' =>'08.00 - 08.45',
            '08.45 - 09.30' =>'08.45 - 09.30',
            '09.30 - 10.00' =>'09.30 - 10.00',
            '10.00 - 10.45' =>'10.00 - 10.45',
            '10.45 - 11.30' =>'10.45 - 11.30',
            '11.30 - 12.15' =>'11.30 - 12.15',
            '12.15 - 13.00' =>'12.15 - 13.00',
            '13.00 - 13.30' =>'13.00 - 13.30',
            '13.30 - 14.15' =>'13.30 - 14.15',
            '14.15 - 15.00' =>'14.15 - 15.00');
        return $jam_pelajaran;
    }
    
    function generateJadwal(){
        $id_kurikulum = $this->input->post('kurikulum');
        $semester     = $this->input->post('semester');
        // ambil data berdasarkan kurikulum yang dipilih
        
        $kurikulum_detail = $this->db->get_where('tbl_kurikulum_detail',array('id_kurikulum'=>$id_kurikulum));
        
        // ambil tahun akademik aktif
        $tahun_akademik = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
        
        
    }
    
     function rombel()
    {
        $this->db->select("id_rombel, nama_rombel");
        $this->db->from("tbl_rombel");
        $this->db->where("id_sekolah", $_SESSION['id_sekolah']);
        
        $query = $this->db->get();
        return $query->result();
    }
    
      function ruangan()
    {
        $this->db->select("id_ruangan, nama_ruangan");
        $this->db->from("tbl_ruangan");
        $this->db->where("id_sekolah", $_SESSION['id_sekolah']);
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function tahun_akademik()
    {
        $this->db->select("tahun_akademik, id_tahun_akademik");
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
    
    function mapel()
    {
        $this->db->select("id_mapel, nama_mapel");
        $this->db->from("tbl_mapel");
        $this->db->where("id_sekolah", $_SESSION['id_sekolah']);
        
        $query = $this->db->get();
        return $query->result();
    }
    
    
    function kelas()
    {
       
        $this->db->select("js.jumlah_kelas");
        $this->db->from("tbl_jenjang_sekolah js");
        $this->db->join("tbl_sekolah_info si", "js.id_jenjang = si.id_jenjang_sekolah");
        
        $query = $this->db->get();
        return $query->row_array();
    }
    function pilih_jadwal($id)
    {
       
        $this->db->select("jd.id_jadwal,jd.id_tahun_akademik,jd.id_mapel as id_mapel,jd.username_guru,jd.jam_mulai,jd.jam_selesai,jd.id_ruangan,jd.semester,jd.hari,jd.id_rombel");
        $this->db->from("tbl_jadwal jd");
        $this->db->where("id_jadwal", $id);
        
        $query = $this->db->get();
        return $query->result();
    }
    function save() {
        $data = array(
            'id_tahun_akademik'             => $this->input->post('ta', TRUE),
            'id_mapel'                      => $this->input->post('mapel', TRUE),
            'username_guru'                 => $this->input->post('guru', TRUE),
            'jam_mulai'                     => $this->input->post('mulai', TRUE),
            'jam_selesai'                   => $this->input->post('selesai', TRUE),
            'id_ruangan'                    => $this->input->post('ruangan', TRUE),
            'hari'                          => $this->input->post('hari', TRUE),
            'semester'                      => $this->input->post('semester', TRUE),
            'id_rombel'                        => $this->input->post('rombel', TRUE),
            'id_sekolah'                        => $_SESSION['id_sekolah']
        );
        $this->db->insert('tbl_jadwal',$data);
    }
    
    function update() {
        $data = array(
            'id_tahun_akademik'             => $this->input->post('ta', TRUE),
            'id_mapel'                      => $this->input->post('mapel', TRUE),
            'username_guru'                 => $this->input->post('guru', TRUE),
            'jam_mulai'                     => $this->input->post('mulai', TRUE),
            'jam_selesai'                   => $this->input->post('selesai', TRUE),
            'id_ruangan'                    => $this->input->post('ruangan', TRUE),
            'hari'                          => $this->input->post('hari', TRUE),
            'semester'                      => $this->input->post('semester', TRUE),
            'id_rombel'                     => $this->input->post('rombel', TRUE),
            'id_sekolah'                    => $_SESSION['id_sekolah']
        );
        $id     = $this->input->post('id_jadwal');
        $this->db->where('id_jadwal',$id);
        $this->db->update('tbl_jadwal',$data);
    }
    
    
}