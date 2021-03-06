<?php

Class Mapel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_mapel');
        
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
    }

    function data() {
        // nama tabel
        $table = 'tbl_mapel';
        // nama PK
        $primaryKey = 'id_mapel';
        // list field
        $columns = array(
            array('db' => 'id_mapel', 'dt' => 'id_mapel'),
            array('db' => 'kd_mapel', 'dt' => 'kd_mapel'),
            array('db' => 'min_a', 'dt' => 'min_a'),
            array('db' => 'min_b', 'dt' => 'min_b'),
            array('db' => 'min_c', 'dt' => 'min_c'),
            array('db' => 'min_d', 'dt' => 'min_d'),
            array('db' => 'min_aplus', 'dt' => 'min_aplus'),
            array('db' => 'min_bplus', 'dt' => 'min_bplus'),
            array('db' => 'min_cplus', 'dt' => 'min_cplus'),
            array('db' => 'min_dplus', 'dt' => 'min_dplus'),
            array('db' => 'min_amin', 'dt' => 'min_amin'),
            array('db' => 'min_bmin', 'dt' => 'min_bmin'),
            array('db' => 'min_cmin', 'dt' => 'min_cmin'),
            array('db' => 'min_dmin', 'dt' => 'min_dmin'),
            array('db' => 'nama_mapel', 'dt' => 'nama_mapel'),
            array(
                'db' => 'id_mapel',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('mapel/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit" title="Edit Mata Pelajaran"').' 
                        '.anchor('mapel/delete/'.$d,'<i class="fa fa-trash-o"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete" title="Hapus Mata Pelajaran"').' 
                        '.anchor('mapel/list_komponen/'.$d,'<i class="fa fa-navicon"></i>','class="btn btn-xs btn-success tooltips" data-placement="top" data-original-title="List" title="Detail Komponen Nilai"');
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
         $where = "id_sekolah =".$_SESSION['id_sekolah']."";
        echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns,$where)
        );
    }

    function index() {
        if($this->session->userdata('id_level_user')==4 || $this->session->userdata('id_level_user')==5){
            // load daftar ngajar guru
            $username = $this->session->userdata('username');
            $id_sekolah = $this->session->userdata('id_sekolah');
            $sql = "SELECT tbl_mapel.id_mapel,kd_mapel,min_a,min_b,min_c,min_d,min_aplus,min_bplus,min_cplus,min_dplus,min_amin,min_bmin,min_cmin,min_dmin,nama_mapel
                    FROM tbl_mapel,tbl_jadwal
                    WHERE tbl_jadwal.username_guru='$username' AND tbl_jadwal.id_sekolah='$id_sekolah' AND tbl_mapel.id_mapel=tbl_jadwal.id_mapel";
            $data['mapel'] = $this->db->query($sql); 
            $this->template->load('template','mapel/mapel_guru',$data);
        }else
        {
            $this->template->load('template', 'mapel/list');
        }
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_mapel->save();
            $this->session->set_flashdata('data_mapel_masuk', 'Data Telah Disimpan');
            redirect('mapel');
        } else {
            $data['info'] = $this->db->get_where('tbl_sekolah_info', array('id_sekolah' => 1,'id_sekolah'=> $_SESSION['id_sekolah']))->row_array();
            //$this->template->load('template', 'info_sekolah', $data);
            $this->template->load('template', 'mapel/add', $data);
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_mapel->update();
            $this->session->set_flashdata('data_mapel_ubah', 'Data Telah Berubah');
            redirect('mapel');
        }else{
            $id_mapel      = $this->uri->segment(3);
           
            //$data['mapel'] = $this->db->get_where('tbl_mapel',array('id_mapel'=>$id_mapel))->row_array();
            $this->db->select('*, a.nama_mapel as amapel,a.id_mapel as id_mpel,a.kd_mapel as kode,a.min_a as nilai_a,a.min_b as nilai_b,a.min_c as nilai_c,a.min_d as nilai_d,b.nilai_max as maximal,b.nilai_min as minimal, a.min_aplus as nilai_aplus,a.min_amin  as nilai_amin, a.min_bplus as nilai_bplus,a.min_bmin as nilai_bmin, a.min_cplus as nilai_cplus,a.min_cmin as nilai_cmin, a.min_dplus as nilai_dplus,a.min_dmin as nilai_dmin');
            $this->db->from('tbl_mapel a'); 
            $this->db->join('tbl_sekolah_info b', 'b.id_sekolah=a.id_sekolah', 'left');
            $this->db->where('a.id_mapel',$id_mapel);
            $query = $this->db->get(); 
            $data['mapel'] = $query->result();
            $this->template->load('template', 'mapel/edit', $data);
        }
    }
    
    function delete(){
        $id_mapel = $this->uri->segment(3);
        if(!empty($id_mapel)){
            // proses delete data
            $this->db->where('id_mapel',$id_mapel);
            $this->db->delete('tbl_mapel');
        }
        $this->session->set_flashdata('data_mapel_hapus', 'Data Telah Dihapus');
        redirect('mapel');
    }
    
    function list_komponen(){
       $id_mapel      = $this->uri->segment(3);
           
            //$data['mapel'] = $this->db->get_where('tbl_mapel',array('id_mapel'=>$id_mapel))->row_array();
            $this->db->select('a.id_komponen,a.porsi,a.nama_komponen,a.id_jenis_nilai,a.id_mapel,b.id_mapel,b.nama_mapel,c.id_jenis_nilai,c.nama_jenis_nilai');
            $this->db->from('tbl_komponen_nilai a'); 
            $this->db->join('tbl_mapel b', 'b.id_mapel=a.id_mapel', 'left');
            $this->db->join('tbl_jenis_nilai c', 'c.id_jenis_nilai=a.id_jenis_nilai', 'left');
            $this->db->where('a.id_mapel',$id_mapel);
            $this->db->where('c.id_jenis_nilai','3');
            $query = $this->db->get(); 
            $data['komponen_pengetahuan'] = $query->result();
        
            $this->db->from('tbl_komponen_nilai a'); 
            $this->db->join('tbl_mapel b', 'b.id_mapel=a.id_mapel', 'left');
            $this->db->join('tbl_jenis_nilai c', 'c.id_jenis_nilai=a.id_jenis_nilai', 'left');
            $this->db->where('a.id_mapel',$id_mapel);
            $this->db->where('c.id_jenis_nilai','4');
            $query = $this->db->get(); 
            $data['komponen_keterampilan'] = $query->result();
            
            $this->db->from('tbl_komponen_nilai a'); 
            $this->db->join('tbl_mapel b', 'b.id_mapel=a.id_mapel', 'left');
            $this->db->join('tbl_jenis_nilai c', 'c.id_jenis_nilai=a.id_jenis_nilai', 'left');
            $this->db->where('a.id_mapel',$id_mapel);
            $this->db->where('c.id_jenis_nilai','1');
            $query = $this->db->get(); 
            $data['komponen_spiritual'] = $query->result();
        
            $this->db->from('tbl_komponen_nilai a'); 
            $this->db->join('tbl_mapel b', 'b.id_mapel=a.id_mapel', 'left');
            $this->db->join('tbl_jenis_nilai c', 'c.id_jenis_nilai=a.id_jenis_nilai', 'left');
            $this->db->where('a.id_mapel',$id_mapel);
            $this->db->where('c.id_jenis_nilai','2');
            $query = $this->db->get(); 
            $data['komponen_sosial'] = $query->result();
            
            $this->template->load('template', 'mapel/komponen', $data);
    }
    
    function add_komponen() {
        if (null !== $this->input->post('submit')) {
            $this->Model_mapel->save_komponen();
        } else {
            //$this->load->library('uri');
            $this->data['id_mapel'] = $this->uri->segment(3);
            $this->data['jenis_nilai'] =  $this->Model_mapel->komponen_jenis_nilai();
            $this->template->load('template', 'mapel/add_komponen', $this->data);
        }
    }
    function edit_komponen($id_komponen) {
        if (null !== $this->input->post('submit')) {
            $this->Model_mapel->ubah_komponen();
            redirect('mapel');
        } else {
            $this->data['jenis_nilai'] =  $this->Model_mapel->komponen_jenis_nilai();
            $this->data['nilai_edit_komponen'] =  $this->Model_mapel->nilai_edit_komponen($id_komponen);
            $this->template->load('template', 'mapel/edit_komponen',  $this->data);
        }
    }
    function hapus_komponen($id_komponen){
        if(!empty($id_komponen)){
            // proses delete data
            $this->db->where('id_komponen',$id_komponen);
            $this->db->delete('tbl_komponen_nilai');
        }
        $this->session->set_flashdata('data_komponen_hapus', 'Data Telah Dihapus');
        redirect('mapel');
    }
    
    
}