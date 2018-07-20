<?php

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_user');
        $this->load->model('Model_guru');
        $this->load->model('Model_siswa');
    }

    function index() {
        $data['data'] = $this->session->flashdata('in');
        
        $this->load->view('auth/homepage', $data);
    }

    function chek_login() {
        if (isset($_POST['submit'])) {
            // proses login disini

            $username       = $this->input->post('sekolah_username');
            $password       = $this->input->post('sekolah_password');
            
         
            
            $loginAdmin     = $this->Model_user->chekLoginadmin($username, $password);
            $loginTU        = $this->Model_user->chekLoginTU($username, $password);
            $loginGuru      = $this->Model_guru->chekLogin($username, $password);
            $loginSiswa     = $this->Model_siswa->chekLogin($username, $password);
            //$loginOrtu     = $this->Model_siswa->chekLoginOrtu($username, $password);
            $loginGuruwali  = $loginGuru['id_guru'];
            $cekwali        = $this->Model_guru->chekwali($loginGuruwali);
            if(!empty($cekwali))
            {
                    $level = '5';    
            }   
            else
            {
                    $level = '4';
            }
            
            if (!empty($loginAdmin)) {
                // sukses login user
                 $session = array(
                    'nama_lengkap'  =>  $loginAdmin['nama_lengkap'],
                    'id_level_user' =>  '2',
                    'id_sekolah'    =>  $loginAdmin['id_sekolah']);
                $this->session->set_userdata($session);
                //$this->session->set_userdata($loginUser);
                $this->session->set_flashdata('message_name', 'This is my message');
                redirect('users/rule');
            } elseif (!empty($loginTU)) {
                // sukses login user
                 $session = array(
                    'nama_lengkap'  =>  $loginTU['nama_lengkap'],
                    'id_level_user' =>  '3',
                    'id_sekolah'    =>  $loginTU['id_sekolah']);
                $this->session->set_userdata($session);
                //$this->session->set_userdata($loginUser);
                $this->session->set_flashdata('message_name', 'This is my message');
                redirect('sekolah');
            } elseif (!empty($loginGuru)) {
                // login guru
                $session = array(
                    'nama_lengkap'  =>  $loginGuru['nama_guru'],
                    'id_level_user' =>  $level,
                    'id_guru'       =>  $loginGuru['id_guru'],
                    'id_sekolah'    =>  $loginGuru['id_sekolah']);
                $this->session->set_userdata($session);
                $this->session->set_flashdata('message_name', 'This is my message');
                redirect('jadwal');
            } elseif (!empty($loginSiswa)) {
                $session = array(
                    'nama_lengkap'  =>  $loginSiswa['nama'],
                    'id_level_user' =>  '6',
                    'nim'           =>  $loginSiswa['nim'],
                    'nisn'          =>  $loginSiswa['nisn'],
                    'id_rombel'     =>  $loginSiswa['id_rombel'],
                    'id_sekolah'    =>  $loginSiswa['id_sekolah']);
                $this->session->set_userdata($session);
                $this->session->set_flashdata('message_name', 'This is my message');
                redirect('jadwal');
            } /*elseif (!empty($loginOrtu)){
                $session = array(
                    'nama_lengkap'  =>  $loginSiswa['nama'],
                    'id_level_user' =>  '7',
                    'nim'           =>  $loginSiswa['nim'],
                    'nisn'          =>  $loginSiswa['nisn'],
                    'id_rombel'     =>  $loginSiswa['id_rombel'],
                    'id_sekolah'    =>  $loginSiswa['id_sekolah']);
                $this->session->set_userdata($session);
                redirect('jadwal');
            }*/
            else {
                // gagal login
                $this->session->set_flashdata('in', 1);
                $this->session->set_flashdata('message_name', '<div style="color:red">Login Gagal, username atau password salah </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('kolom_kosong', '<div style="color:red">Semua Kolom harus diisi </div>');
            redirect('auth');
            
        }
    }
    
    function chek_login_siswa() {
        if (isset($_POST['submit'])) {
            // proses login disini

            $username       = $this->input->post('siswa_username');
            $password       = $this->input->post('siswa_password');
            
         
             $loginAdmin     = $this->Model_user->chekLoginadmin($username, $password);
            $loginTU        = $this->Model_user->chekLoginTU($username, $password);
            $loginGuru      = $this->Model_guru->chekLogin($username, $password);
            $loginSiswa     = $this->Model_siswa->chekLogin($username, $password);
            
            
            if (!empty($loginSiswa)) {
                $session = array(
                    'nama_lengkap'  =>  $loginSiswa['nama'],
                    'id_level_user' =>  '6',
                    'nim'           =>  $loginSiswa['nim'],
                    'nisn'          =>  $loginSiswa['nisn'],
                    'id_rombel'     =>  $loginSiswa['id_rombel'],
                    'id_sekolah'    =>  $loginSiswa['id_sekolah']);
                $this->session->set_userdata($session);
                $this->session->set_flashdata('message_name', 'This is my message');
                redirect('jadwal');
            } 
            else {
                // gagal login
                $this->session->set_flashdata('message_name', '<div style="color:red">Login Gagal, username atau password salah </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('kolom_kosong', '<div style="color:red">Semua Kolom harus diisi </div>');
            redirect('auth');
            
        }
    }
    
    function chek_login_ortu() {
        if (isset($_POST['submit'])) {
            // proses login disini

            $username       = $this->input->post('ortu_username');
            $password       = $this->input->post('ortu_password');
            
         
            $loginOrtu     = $this->Model_siswa->chekLoginOrtu($username, $password);
            if (!empty($loginOrtu)){
                $session = array(
                    'nama_lengkap'  =>  $loginOrtu['nama'],
                    'id_level_user' =>  '7',
                    'nim'           =>  $loginOrtu['nim'],
                    'nisn'          =>  $loginOrtu['nisn'],
                    'id_rombel'     =>  $loginOrtu['id_rombel'],
                    'id_sekolah'    =>  $loginOrtu['id_sekolah']);
                $this->session->set_userdata($session);
                redirect('jadwal');
            }
            else {
                // gagal login
                $this->session->set_flashdata('in', 3);
                $this->session->set_flashdata('message_name', '<div style="color:red">Login Gagal, username atau password salah </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('kolom_kosong', '<div style="color:red">Semua Kolom harus diisi </div>');
            redirect('auth');
            
        }
    }
    function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

}