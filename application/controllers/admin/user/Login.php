<?php 
    class login extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_login_user');
            $this->load->library(array('form_validation','session'));
            $this->load->database();
            $this->load->helper('url');
        }
        public function index(){
            $session = $this->session->userdata('Login');
            if($session !='berhasil'){
                $this->load->view('admin/header');
                $this->load->view('admin/home');
                $this->load->view('admin/footer');
            }else{
                redirect('admin/user/welcome');
            }
        }
        public function login_form(){
            if ($this->session->userdata('Login')== 'berhasil') {
                redirect('admin/user/welcome');
            }
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|md5');
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if($this->form_validation->run()==FALSE){
                $this->load->view('admin/header');
                $this->load->view('admin/home');
                $this->load->view('admin/footer');
            }else{
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $cek= $this->m_login_user->getPengguna($username, $password,1);

                if($cek->num_rows() == 1) {

                    foreach ($cek->result() as $c) {
                            $data_user['Login']       = 'berhasil';
                            $data_user['username']    = $c->username;
                            $data_user['idUser']     = $c->idUser;
                            $data_user['nama']        = $c->nama;
                            $data_user['email']        = $c->email;
                        
                            $this->session->set_userdata($data_user);
                            redirect('admin/user/welcome');
                    }
                    
                }else{
                    echo " <script>
                            alert('Gagal Login: Cek username dan password anda!');
                            history.go(-1);
                        </script>";
                }
            }
        }
        public function logout(){
            $this->session->sess_destroy();
            redirect('admin/user/login','refresh');
        }
    }
?>