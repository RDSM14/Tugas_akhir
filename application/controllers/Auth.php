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
            $loginGuruwali  = $loginGuru['username'];
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
                    'username'      =>  $loginAdmin['email'],
                    'nama_lengkap'  =>  $loginAdmin['nama_lengkap'],
                    'id_level_user' =>  '2',
                    'id_sekolah'    =>  $loginAdmin['id_sekolah']);
                $this->session->set_userdata($session);
                //$this->session->set_userdata($loginUser);
                $this->session->set_flashdata('message_name', 'This is my message');
                redirect('sekolah');
            } elseif (!empty($loginTU)) {
                // sukses login user
                 $session = array(
                    'username'      =>  $loginGuru['username'],
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
                    'username'      =>  $loginGuru['username'],
                    'nama_lengkap'  =>  $loginGuru['nama_guru'],
                    'id_level_user' =>  $level,
                    'id_guru'       =>  $loginGuru['id_guru'],
                    'id_sekolah'    =>  $loginGuru['id_sekolah']);
                $this->session->set_userdata($session);
                $this->session->set_flashdata('message_name', 'This is my message');
                redirect('sekolah');
            }/* elseif (!empty($loginSiswa)) {
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
                    
                    'username'      =>  $loginSiswa['nisn'],
                    'nama_lengkap'  =>  $loginSiswa['nama'],
                    'id_level_user' =>  '6',
                    'nim'           =>  $loginSiswa['nim'],
                    'nisn'          =>  $loginSiswa['nisn'],
                    'id_rombel'     =>  $loginSiswa['id_rombel'],
                    'id_sekolah'    =>  $loginSiswa['id_sekolah']);
                $this->session->set_userdata($session);
                $this->session->set_flashdata('message_name', 'This is my message');
                redirect('sekolah');
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
                    'username'      =>  $loginOrtu['nisn'],
                    'nama_lengkap'  =>  $loginOrtu['nama'],
                    'id_level_user' =>  '7',
                    'nim'           =>  $loginOrtu['nim'],
                    'nisn'          =>  $loginOrtu['nisn'],
                    'id_rombel'     =>  $loginOrtu['id_rombel'],
                    'id_sekolah'    =>  $loginOrtu['id_sekolah']);
                $this->session->set_userdata($session);
                $this->session->set_flashdata('message_name', 'This is my message');
                redirect('sekolah');
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
    function password(){
            $this->template->load('template', 'password/ganti');
    }
    
    function forgot_password() {
        if (isset($_POST['submit'])) {
            // Verifikasi Akun
            //CEKEMAILDULUADAAPANGGAK??????????????????????????????????
            $email=$_POST['email']; 
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
            
            $emailAdmin     = $this->Model_user->chekemailadmin($email);
            if (!empty($emailAdmin)) {
                if(preg_match($regex, $email))
                {  
                    $activation=md5($email); // Encrypted email+timestamp md5
                    include 'smtp/Send_Mail.php';
                    $to=$email;
                    $subject="Reset Password";
                    $body='Hi, <br/> <br/> Click Link Below if You Want to Reset Your Password <br/> <br/> <a href="'.base_url().'template/password/'.$activation.'">'.base_url().'template/password/'.$activation.'</a>';
                    Send_Mail($to,$subject,$body);
                       // .$base_url.
                    $this->session->set_flashdata('data_email_masuk', 'Data Telah Masuk');
                    redirect('auth');
                    //$msg= "Registration successful, please activate email.";	
                }
            }
            $this->session->set_flashdata('data_email_gagal', 'Data Telah Masuk');
            redirect('auth');
        }
    }
        
    function agreed(){ 
            $username            = $this->input->post('username',TRUE);
            $password            = $this->input->post('password_lama',TRUE);
            $password_baru       = md5($this->input->post('password_baru',TRUE));
            $level_user          = $this->input->post('level_user',TRUE);
            $cek_password        = md5($this->input->post('cek_password',TRUE));
            
            if($password_baru==$cek_password){
                if($level_user=='2'){
                    $cekAdmin = $this->Model_user->chekadmin($username, $password);
                    if (!empty($cekAdmin)) 
                    { 
                        $data = array(
                            'password'      => $password_baru
                        );
                        
                        $this->db->where('email',$username);
                        $this->db->update('tbl_admin',$data);
                        $this->session->set_flashdata('benar', 'Data');
                        redirect('auth/password');
                    }
                    else
                    {
                        $this->session->set_flashdata('beda_password', 'Data');
                        redirect('auth/password');
                    }
                }elseif($level_user=='3'){
                    $cekTU = $this->Model_user->chekLoginTU($username, $password);
                    if (!empty($cekTU)) 
                    {
                        $data = array(
                            'password'      => $password_baru
                        );
                        
                        $this->db->where('username',$username);
                        $this->db->update('tbl_tu',$data);
                        $this->session->set_flashdata('benar', 'Data');
                        redirect('auth/password');
                    }
                    else
                    {
                        $this->session->set_flashdata('beda_password', 'Data');
                        redirect('auth/password');
                    }
                }elseif($level_user=='4' || $level_user=='5'){
                    $cekGuru= $this->Model_guru->chekLogin($username, $password);
                    if (!empty($cekGuru)) 
                    {
                        $data = array(
                            'password'      => $password_baru
                        );
                        
                        $this->db->where('username',$username);
                        $this->db->update('tbl_guru',$data);
                        $this->session->set_flashdata('benar', 'Data');
                        redirect('auth/password');
                    }
                    else
                    {
                        $this->session->set_flashdata('beda_password', 'Data');
                        redirect('auth/password');
                    }
                }elseif($level_user=='6'){
                    $ceksiswa = $this->Model_siswa->chekLogin($username, $password);
                    if (!empty($ceksiswa)) 
                    {
                        $data = array(
                            'password'      => $password_baru
                        );
                        
                        $this->db->where('nisn',$username);
                        $this->db->update('tbl_siswa',$data);
                        $this->session->set_flashdata('benar', 'Data');
                        redirect('auth/password');
                    }
                    else
                    {
                        $this->session->set_flashdata('beda_password', 'Data');
                        redirect('auth/password');
                    }
                    
                }elseif($level_user=='7'){
                    $cekortu = $this->Model_siswa->chekLoginOrtu($username, $password);
                    if (!empty($cekortu)) 
                    {
                        $data = array(
                            'password_orangtua'      => $password_baru
                        );
                        
                        $this->db->where('nisn',$username);
                        $this->db->update('tbl_orang_tua',$data);
                        $this->session->set_flashdata('benar', 'Data');
                        redirect('auth/password');
                    }
                    else
                    {
                        $this->session->set_flashdata('beda_password', 'Data');
                        redirect('auth/password');
                    }
                }
                 
            }
            else
            {
                    $this->session->set_flashdata('data_gak_sama', 'Data');
                    redirect('auth/password');
            }
    

}
}