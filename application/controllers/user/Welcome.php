<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
  public function __construct() 
  {
    parent::__construct();
    $this->load->model('m_login');
    $this->load->database();
    $this->load->helper(array('form', 'url'));

    
  }

  public function index()
  {

    $admin['tes'] = 0;
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');

    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{
        $this->load->model('m_login');
        $user = $this->session->userdata('username');
        //$total = $this->m_admin->count_all();
        //$totalPesan = $this->m_pesan->count_all();
        $this->data['admin'] = $this->m_login->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/index',$admin/*,array('total' => $total,'totalPesan' => $totalPesan)*/);
        $this->load->view('user/footer');
    }
             
  }


  //function profil

  function profil()
  {
       
        //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
    $admin['tes'] = 0;
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{
        $admin['tes'] = 1;

        $this->load->model('m_admin');
        $idAdmin = $this->session->userdata('idAdmin');

        $admin['no'] = $this->m_admin->select($idAdmin);
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login');
        $user = $this->session->userdata('username');
        //$admin['admin'] = $this->m_admin->count_all();
        //$admin['pesan'] = $this->m_pesan->count_all();
        

        $this->data['admin'] = $this->m_login->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/index', $admin);
        $this->load->view('user/footer');
    }        
  }


  function ubahPassword()
  {
    $admin['tes'] = 0;
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');

    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{
          $data['tes'] = 2;

          $this->load->model('m_admin');
          $idAdmin = $this->session->userdata('idAdmin');
          if($_POST==NULL) {
              $data['no'] = $this->m_admin->select($idAdmin);
              $this->load->model('m_login');
              $user = $this->session->userdata('username');
              
              $this->data['admin'] = $this->m_login->data($user);
              $this->load->view('user/header',$this->data);
              $this->load->view('user/index',$data);
              $this->load->view('user/footer');
          }else {
              $cek = $this->input->post('password');
              $cek2 = $this->input->post('password2');

              if ($cek == $cek2) {
                $this->m_admin->updatePassword($idAdmin);
                redirect('user/welcome/logout');
              }else{
                echo "<script> alert('password tidak singkron'); </script>";
                $data['no'] = $this->m_admin->select($idAdmin);
                $this->load->model('m_login');
                $user = $this->session->userdata('username');
              
                $this->data['admin'] = $this->m_login->data($user);
                $this->load->view('user/header',$this->data);
                $this->load->view('user/index',$data);
                $this->load->view('user/footer');
              }
              
          }
    }    
  }



  //---------------------------------------------------membuat fungsi crud tabel Admin-----------------------------------------------------------------

  function admin()
  {

    $admin['tes'] = 0;
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{
        //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
        $this->load->model('m_admin');
        $admin['admin'] = $this->m_admin->selectAll();

   
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login');
        $user = $this->session->userdata('username');
        
        $this->data['admin'] = $this->m_login->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/admin/admin', $admin);
        $this->load->view('user/footer');
    }    
  }  

  function inputAdmin()
  {
    
    $admin['tes'] = 0;
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{    
        $kode = 'admin';  
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login');
        $this->load->model('m_admin');
        $user = $this->session->userdata('username');
        $admin['kodeunik'] = $this->m_admin->getkodeunik($kode);
        
        $this->data['admin'] = $this->m_login->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/admin/inputadmin',$admin);
        $this->load->view('user/footer');
    }
  }
  
  function tambahAdmin()
  {
    $admin['tes'] = 0;
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{    
    
        $this->load->model('m_admin');
        $this->m_admin->input();     
        redirect('user/welcome/admin/admin');
    }
  }

  function deleteAdmin($idAdmin)
  {
    $admin['tes'] = 0;
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{    
    
        $this->load->model('m_admin');
        $this->m_admin->delete($idAdmin);
        redirect('user/welcome/admin/admin');
    }
  }
  
  function editAdmin($idAdmin) 
  {
    $admin['tes'] = 0;
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{    
        $this->load->model('m_admin');
        if($_POST==NULL) {
              $data['no'] = $this->m_admin->select($idAdmin);
              $this->load->model('m_login');
              $user = $this->session->userdata('username');
              
              $this->data['admin'] = $this->m_login->data($user);
              $this->load->view('user/header',$this->data);
              $this->load->view('user/admin/editadmin',$data);
              $this->load->view('user/footer');
        }else {
              $this->m_admin->update($idAdmin);
              redirect('user/welcome/profil');
        }
    }
  }



  //---------------------------------------------------membuat fungsi crud tabel Jadwal-----------------------------------------------------------------

  function jadwal()
  {

    $this->load->model('m_login');
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
        $this->load->model('m_login');
        $user = $this->session->userdata('username');
        
        $this->data['admin'] = $this->m_login->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/jadwal/jadwal', $jadwal);
        $this->load->view('user/footer');
    }    
  }  

  
  function inputJadwal()
  {
    
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{    
        $kode = 'jadwal';  
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login');
        $this->load->model('m_jadwal');
        $user = $this->session->userdata('username');
        $jadwal['kodeunik'] = $this->m_jadwal->getkodeunik($kode);
        
        $this->data['admin'] = $this->m_login->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/jadwal/inputjadwal',$jadwal);
        $this->load->view('user/footer');
    }
  }
  
  
  function tambahJadwal()
  {

    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{    
    
        $this->load->model('m_jadwal');
        $this->m_jadwal->input();     
        redirect('user/welcome/jadwal/jadwal');
    }
  }

  
  function deleteJadwal($idJadwal)
  {
    $admin['tes'] = 0;
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{    
    
        $this->load->model('m_jadwal');
        $this->m_jadwal->delete($idJadwal);
        echo "<script> alert('berhasil dihapus'); </script>";
        redirect('user/welcome/jadwal/jadwal');
    }
  }
  
  
  function editjadwal($idJadwal) 
  {
    $admin['tes'] = 0;
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{    
            $this->load->model('m_jadwal');
            if($_POST==NULL) {
                $data['no'] = $this->m_jadwal->select($idJadwal);
                $this->load->model('m_login');
                $user = $this->session->userdata('username');
                
                $this->data['admin'] = $this->m_login->data($user);
                $this->load->view('user/header',$this->data);
                $this->load->view('user/jadwal/editjadwal',$data);
                $this->load->view('user/footer');
            }else {
                $this->m_jadwal->update($idJadwal);
                redirect('user/welcome/jadwal/jadwal');
            }
    }
  }


 //---------------------------------------------------membuat fungsi crud tabel User-----------------------------------------------------------------

  function user()
  {

    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{
        //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
        $this->load->model('m_user');
        $user['user'] = $this->m_user->selectAll();

   
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login');
        $us = $this->session->userdata('username');
        
        $this->data['admin'] = $this->m_login->data($us);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/user/user',$user);
        $this->load->view('user/footer');
    }    
  }  

  
  function inputUser()
  {
    
    $this->load->model('m_login');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }else{    
        $kode = 'user';  
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login');
        $this->load->model('m_user');
        $us = $this->session->userdata('username');
        $user['kodeunik'] = $this->m_user->getkodeunik($kode);
        
        $this->data['admin'] = $this->m_login->data($us);
        $this->load->view('user/header',$this->data);

        $this->load->view('user/user/inputuser',$user);
        $this->load->view('user/footer');
    }
  }
  
  function tambahUser()
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
        $this->m_user->input();     
        redirect('user/welcome/user/user');
    }
  }

  
  function deleteUser($idUser)
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
        $this->m_user->delete($idUser);
        redirect('user/welcome/user/user');
    }
  }
  
  



	
  function logout()
  {
    $this->session->unset_userdata('Login');
    redirect('admin/user/login','refresh');
  }
}
?>