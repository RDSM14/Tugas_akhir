<?php

Class Rombel extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
        $this->load->library('ssp');
        $this->load->model('Model_rombel');
    }

    function data() {
        // nama tabel
        $table = 'tbl_rombel';
        // nama PK
        $primaryKey = 'id_rombel';
        // list field
        $columns = array(
            array('db' => 'id_rombel', 'dt' => 'id_rombel'),
            array('db' => 'nama_rombel', 'dt' => 'nama_rombel'),
            array('db' => 'kelas', 'dt' => 'kelas'),
            array(
                'db' => 'id_rombel',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('rombel/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('rombel/delete/'.$d,'<i class="fa fa-trash-o"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'rombel/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_rombel->save();
            $this->session->set_flashdata('data_rombel_masuk', 'Data Telah Ditambah');
            redirect('rombel');
        } else {
            $id_sekolah = $_SESSION['id_sekolah'];
            $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah AND id_sekolah=".$id_sekolah;
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $this->template->load('template', 'rombel/add',$data);
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_rombel->update();
            $this->session->set_flashdata('data_rombel_change', 'Data Telah Diubah');
            redirect('rombel');
        }else{
            $id_sekolah = $_SESSION['id_sekolah'];
            $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah AND id_sekolah=".$id_sekolah;
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $id_rombel      = $this->uri->segment(3);
            $data['rombel'] = $this->db->get_where('tbl_rombel',array('id_rombel'=>$id_rombel))->row_array();
            $this->template->load('template', 'rombel/edit',$data);
        }
    }
    
    function delete(){
        $id_rombel = $this->uri->segment(3);
        if(!empty($id_rombel)){
            // proses delete data
            $this->db->where('id_rombel',$id_rombel);
            $this->db->delete('tbl_rombel');
        }
        
        $this->session->set_flashdata('data_rombel_hapus', 'Data Telah Dihapus');
        redirect('rombel');
    }
    
    function show_combobox_rombel_by_jurusan(){
        
        $jurusan = $_GET['jurusan'];
        echo "<select name='rombel' id='rombel2' class='form-control' onchange='loadSiswa()'>";
        $this->db->where('kd_jurusan',$jurusan);
        $rombel = $this->db->get('tbl_rombel');
        foreach ($rombel->result() as $row){
            echo "<option value='$row->id_rombel'>$row->nama_rombel</option>";
        }
        echo"</select>";
    }

}