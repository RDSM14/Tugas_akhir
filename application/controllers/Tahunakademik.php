<?php

Class Tahunakademik extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_tahunakademik');
        if($_SESSION['id_sekolah'] == null)
        {
            redirect('');
        }
    }

    function data() {
        // nama tabel
        $table = 'tbl_tahun_akademik';
        // nama PK
        $primaryKey = 'id_tahun_akademik';
        // list field
        $columns = array(
            array('db' => 'id_tahun_akademik', 'dt' => 'id_tahunakademik'),
            array('db' => 'tahun_akademik', 'dt' => 'tahun_akademik'),
            array('db' => 'semester_aktif', 'dt' => 'semester_aktif'),
            array('db' => 'is_aktif',
                'dt' => 'is_aktif',
                'formatter' => function( $d) {
                    return $d=='y'?'Aktif':'Tidak Aktif';
                }),
            array(
                'db' => 'id_tahun_akademik',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('tahunakademik/edit/' . $d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"') . ' 
                        ' . anchor('tahunakademik/delete/' . $d, '<i class="fa fa-trash-o"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'tahunakademik/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_tahunakademik->save();
            $idTahunAkademik = $this->db->insert_id();
            
            $this->session->set_flashdata('data_ta_masuk', 'Data');
            // setup data dumy walikelas
            //$this->load->model('Model_walikelas');
            //$this->Model_walikelas->setup_walikelas($idTahunAkademik);
            redirect('tahunakademik');
        } else {
            $this->template->load('template', 'tahunakademik/add');
        }
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $this->Model_tahunakademik->update();
            $this->session->set_flashdata('data_ta_change', 'Data');
            redirect('tahunakademik');
        } else {
            $Id_tahun_akademik = $this->uri->segment(3);
            $data['tahunakademik'] = $this->db->get_where('tbl_tahun_akademik', array('Id_tahun_akademik' => $Id_tahun_akademik))->row_array();
            $this->template->load('template', 'tahunakademik/edit', $data);
        }
    }

    function delete() {
        $id_tahun_akademik = $this->uri->segment(3);
        if (!empty($id_tahun_akademik)) {
            // proses delete data
            $this->db->where('id_tahun_akademik', $id_tahun_akademik);
            $this->db->delete('tbl_tahun_akademik');
            $this->session->set_flashdata('data_ta_hapus', 'Data');
        }
        redirect('tahunakademik');
    }

}