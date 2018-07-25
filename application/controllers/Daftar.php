<?php

Class Daftar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_user');
        
    }
    function index() {
        //$this->template->load('template', 'admin/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $id_school = $this->Model_user->cariId();
            //$id_sekolah = explode(",",$id_school);
            $id = $id_school + 1;
            $this->Model_user->saveadmin($id);
            $this->session->set_flashdata('data_daftar_masuk', 'Data Telah Masuk');
            redirect('auth');
        } else {
            $this->session->set_flashdata('data_daftar_gagal', 'Data Telah Masuk');
            redirect('auth');
        }
    }
    }