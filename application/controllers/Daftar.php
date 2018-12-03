<?php

Class Daftar extends CI_Controller {

    function __construct() {
        parent::__construct();
       // $this->load->library('SSP');
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
            // Verifikasi Akun
            $email=$_POST['email']; 
            $password=$_POST['password']; 

            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

            if(preg_match($regex, $email))
            {  
            $password=md5($password); // Encrypted password
            $activation=md5($email); // Encrypted email+timestamp md5
            include 'smtp/Send_Mail.php';
            $to=$email;
            $subject="Email verification";
            $body='Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'.base_url().'template/activation/'.$activation.'">'.base_url().'template/activation/'.$activation.'</a>';
            Send_Mail($to,$subject,$body);
               // .$base_url.
            $this->session->set_flashdata('data_daftar_masuk', 'Data Telah Masuk');
            //$msg= "Registration successful, please activate email.";	

            }
            
            redirect('auth');
        } else {
            $this->session->set_flashdata('data_daftar_gagal', 'Data Telah Masuk');
            redirect('auth');
        }
    }
    }