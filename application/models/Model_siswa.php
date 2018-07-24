<?php

class Model_siswa extends CI_Model {
    
    public $table ="tbl_siswa";
    
    function save($foto) {
        $data = array(
            'nim'           => $this->input->post('nim', TRUE),
            'nisn'          => $this->input->post('nisn', TRUE),
            'kd_agama'      => $this->input->post('agama', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
            'gender'        => $this->input->post('gender', TRUE),
            'foto'          => $foto,
            'id_rombel'     => $this->input->post('rombel',TRUE),
            'alamat_siswa'  => $this->input->post('alamat_siswa', TRUE),
            'status_keluarga'=> $this->input->post('status_keluarga', TRUE),
            'telepon_siswa' => $this->input->post('telepon_siswa', TRUE),
            'asal_sekolah'  => $this->input->post('asal_sekolah', TRUE),
            'kelas_terima'  => $this->input->post('rombel', TRUE),
            'id_sekolah'    => $this->input->post('id_sekolah', TRUE),
            'tanggal_terima'=> $this->input->post('tanggal_terima', TRUE)
            
        );
        $this->db->insert($this->table,$data);
        
        $tahun_akademik = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
        
        $history =  array(
            'nim'                 =>  $this->input->post('nim', TRUE),
            'nisn'                => $this->input->post('nisn', TRUE),
            'id_tahun_akademik'   =>  $tahun_akademik['id_tahun_akademik'],
            'id_rombel'           =>  $this->input->post('rombel', TRUE)
            );
        $this->db->insert('tbl_history_kelas',$history);
    }
    
    function update($foto) {
        if(empty($foto)){
            // update without foto
            $data = array(
            'nama'          => $this->input->post('nama', TRUE),
            'kd_agama'      => $this->input->post('agama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
            'gender'        => $this->input->post('gender', TRUE),
            'id_rombel'     => $this->input->post('rombel',TRUE),
            'alamat_siswa'  => $this->input->post('alamat_siswa', TRUE),
            'status_keluarga'=> $this->input->post('status_keluarga', TRUE),
            'telepon_siswa' => $this->input->post('telepon_siswa', TRUE),
            'asal_sekolah'  => $this->input->post('asal_sekolah', TRUE),
            'id_sekolah'   => $_SESSION['id_sekolah'],
            //'kelas_terima'  => $this->input->post('kelas_terima', TRUE),
            'tanggal_terima'=> $this->input->post('tanggal_terima', TRUE)
        );
        }else{
            // update with foto
            $data = array(
            'nama'          => $this->input->post('nama', TRUE),
            'kd_agama'      => $this->input->post('agama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
            'gender'        => $this->input->post('gender', TRUE),
            'foto'          => $foto,
            'id_rombel'     => $this->input->post('rombel',TRUE),
            'alamat_siswa'  => $this->input->post('alamat_siswa', TRUE),
            'status_keluarga'=> $this->input->post('status_keluarga', TRUE),
            'telepon_siswa' => $this->input->post('telepon_siswa', TRUE),
            'asal_sekolah'  => $this->input->post('asal_sekolah', TRUE),
            'id_sekolah'   => $_SESSION['id_sekolah'],    
            //'kelas_terima'  => $this->input->post('kelas_terima', TRUE),
            'tanggal_terima'=> $this->input->post('tanggal_terima', TRUE)
        );
        }
        $nim   = $this->input->post('nim');
        $this->db->where('nim',$nim);
        $this->db->update($this->table,$data);
    }
    
    function chekLogin($username,$password){
        $this->db->where('nisn',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tbl_siswa')->row_array();
        return $user;
    }
    function chekLoginOrtu($username,$password){
        $this->db->select('*,b.nisn,b.password_orangtua');
        $this->db->from('tbl_siswa a'); 
        $this->db->join('tbl_orang_tua b', 'b.nisn=a.nisn', 'left');
        $this->db->where('b.nisn',$username);
        $this->db->where('password_orangtua',  md5($password)); 
        $query = $this->db->get();
        $user = $query->row_array();
        return $user;
    }
}