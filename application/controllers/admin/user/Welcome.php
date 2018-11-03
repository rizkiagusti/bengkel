<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
  public function __construct() 
  {
    parent::__construct();
    $this->load->model('m_login_user');
    //$this->load->model(array('m_admin','m_login_user','m_rute','m_jadwal','m_armada','m_pesan'));//
    $this->load->database();
    $this->load->helper(array('form', 'url'));

    
  }

  public function index()
  {

    $user['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');

    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
        $this->load->model('m_login_user');
        $us = $this->session->userdata('username');
        //$total = $this->m_admin->count_all();
        //$totalPesan = $this->m_pesan->count_all();
        $this->data['admin'] = $this->m_login_user->data($us);
        $this->load->view('admin/user/header',$this->data);
        $this->load->view('admin/user/index',$user/*,array('total' => $total,'totalPesan' => $totalPesan)*/);
        $this->load->view('admin/user/footer');
    }
             
  }

  
  //function profil

  function profil()
  {
       
        //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
    $user['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
        $user['tes'] = 1;

        $this->load->model('m_user');
        $idUser = $this->session->userdata('idUser');

        $user['no'] = $this->m_user->select($idUser);
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login_user');
        $us = $this->session->userdata('username');
        //$admin['admin'] = $this->m_admin->count_all();
        //$admin['pesan'] = $this->m_pesan->count_all();
        

        $this->data['admin'] = $this->m_login_user->data($us);
        $this->load->view('admin/user/header',$this->data);
        $this->load->view('admin/user/index', $user);
        $this->load->view('admin/user/footer');
    }        
  }


  function ubahPassword()
  {
    $user['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');

    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
          $data['tes'] = 2;

          $this->load->model('m_user');
          $idUser = $this->session->userdata('idUser');
          if($_POST==NULL) {
              $data['no'] = $this->m_user->select($idUser);
              $this->load->model('m_login_user');
              $us = $this->session->userdata('username');
              
              $this->data['admin'] = $this->m_login_user->data($us);
              $this->load->view('admin/user/header',$this->data);
              $this->load->view('admin/user/index',$data);
              $this->load->view('admin/user/footer');
          }else {
              $cek = $this->input->post('password');
              $cek2 = $this->input->post('password2');

              if ($cek == $cek2) {
                $this->m_user->updatePassword($idUser);
                redirect('admin/user/welcome/logout');
              }else{
                echo "<script> alert('password tidak singkron'); </script>";
                $data['no'] = $this->m_user->select($idUser);
                $this->load->model('m_login_user');
                $us = $this->session->userdata('username');
              
                $this->data['admin'] = $this->m_login_user->data($us);
                $this->load->view('admin/user/header',$this->data);
                $this->load->view('admin/user/index',$data);
                $this->load->view('admin/user/footer');
              }
              
          }
    }    
  }

  function editUser($idUser) 
  {

    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{    
        $this->load->model('m_user');
        if($_POST==NULL) {
              $data['no'] = $this->m_user->select($idUser);
              $this->load->model('m_login_user');
              $us = $this->session->userdata('username');
              //$admin['admin'] = $this->m_admin->count_all();
              //$admin['pesan'] = $this->m_pesan->count_all();
        

              $this->data['admin'] = $this->m_login_user->data($us);
              $this->load->view('admin/user/header',$this->data);
              $this->load->view('user/user/editUser',$data);
              $this->load->view('admin/user/footer');
        }else {
              $this->m_user->update($idUser);
              redirect('admin/user/welcome/profil');
        }
    }
  }


  function kendaraan()
  {

    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
          //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
          $this->load->model('m_kendaraan');
     
          //meload view bernama buku_view.php dengan data variable adalah $data
          $this->load->model('m_login_user');
          
          $idUser = $this->session->userdata('idUser');
          $kendaraan['kendaraan'] = $this->m_kendaraan->tampil($idUser);

          $us = $this->session->userdata('username');
          $this->data['admin'] = $this->m_login_user->data($us);
          $this->load->view('admin/user/header',$this->data);
          $this->load->view('admin/user/kendaraan/kendaraan', $kendaraan);
          $this->load->view('admin/user/footer');
    }
          
  }  

  
  function inputKendaraan()
  {
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
    
          $kode = 'kendaraan';  
          //meload view bernama buku_view.php dengan data variable adalah $data
          $this->load->model('m_login_user');
          $this->load->model('m_kendaraan');

          $kendaraan['kodeunik'] = $this->m_kendaraan->getkodeunik($kode);

          $idUser = $this->session->userdata('idUser');

          $us = $this->session->userdata('username');
          $this->data['admin'] = $this->m_login_user->data($us);

          $this->load->view('admin/user/header',$this->data);
          $this->load->view('admin/user/kendaraan/inputkendaraan',$kendaraan,$this->data);
          $this->load->view('admin/user/footer');
    }
  }

  function tambahKendaraan()
  {
          $this->load->model('m_kendaraan');
          $this->m_kendaraan->input();     
          redirect('admin/user/welcome/kendaraan');
  }

  
  function deleteKendaraan($idKen)
  {
            $this->load->model('m_kendaraan');
            $this->m_kendaraan->delete($idKen);
            redirect('admin/user/welcome/kendaraan');
  }
  
  
  function editKendaraan($idKen) 
  {
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
            $this->load->model('m_kendaraan');
            if($_POST==NULL) {
                $data['no'] = $this->m_kendaraan->select($idKen);
                $this->load->model('m_login_user');
                $us = $this->session->userdata('username');
                
                $this->data['admin'] = $this->m_login_user->data($us);
                $this->load->view('admin/user/header',$this->data);
                $this->load->view('admin/user/kendaraan/editkendaraan',$data);
                $this->load->view('admin/user/footer');
            }else {
                $this->m_kendaraan->update($idKen);
                redirect('admin/user/welcome/kendaraan');
            }
    }
  }


/*------------------------------------------------tiket-------------*/

  function daftarTiket()
  {

    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
          //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
          $this->load->model('m_booking');
     
          //meload view bernama buku_view.php dengan data variable adalah $data
          $this->load->model('m_login_user');
          
          $idUser = $this->session->userdata('idUser');
          $tiket['tiket'] = $this->m_booking->tampil($idUser);

          $us = $this->session->userdata('username');
          $this->data['admin'] = $this->m_login_user->data($us);
          $this->load->view('admin/user/header',$this->data);
          $this->load->view('admin/user/tiket/daftartiket', $tiket);
          $this->load->view('admin/user/footer');
    }
          
  } 
  

  function tiket()
  {

    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{
        //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
        $this->load->model('m_jadwal');
        $jadwal['jadwal'] = $this->m_jadwal->selectAll();

   
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login_user');
        $us = $this->session->userdata('username');
        
        $this->data['admin'] = $this->m_login_user->data($us);

        $this->load->view('admin/user/header',$this->data);
        $this->load->view('admin/user/tiket/tiket', $jadwal);
        $this->load->view('admin/user/footer');
    }    
  }  

  function inputTiket($idJadwal)
  {

    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{
        //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
          $this->load->model('m_jadwal');
          $this->load->model('m_booking');
          $kode = 'booking';  
          //meload view bernama buku_view.php dengan data variable adalah $data
          $pesan['no'] = $this->m_jadwal->select($idJadwal);
          $this->load->model('m_login_user');
          
          $us = $this->session->userdata('username');
          $pesan['kodeunik'] = $this->m_booking->getkodeunik($kode);
          
          $this->data['admin'] = $this->m_login_user->data($us);

          $this->load->view('admin/user/header',$this->data);
          $this->load->view('admin/user/tiket/inputtiket',$pesan,$this->data);
          $this->load->view('admin/user/footer');
    }    
  } 

  function tambahTiket()
  {
        $this->load->model('m_booking');
        $this->m_booking->input();     
        redirect('admin/user/welcome/daftarTiket');
  }


 
	
  function logout()
  {
    $this->session->unset_userdata('Login');
    redirect('user/login','refresh');
  }
}
?>