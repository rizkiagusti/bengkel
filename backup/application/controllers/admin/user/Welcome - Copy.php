<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
  public function __construct() 
  {
    parent::__construct();
    $this->load->model('m_login_user_user');
    //$this->load->model(array('m_admin','m_login_user','m_rute','m_jadwal','m_armada','m_pesan'));//
    $this->load->database();
    $this->load->helper(array('form', 'url'));

    
  }

  public function index()
  {

    $admin['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');

    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
        $this->load->model('m_login_user');
        $user = $this->session->userdata('username');
        //$total = $this->m_admin->count_all();
        //$totalPesan = $this->m_pesan->count_all();
        $this->data['admin'] = $this->m_login_user->data($user);
        $this->load->view('admin/user/header',$this->data);
        $this->load->view('admin/user/index',$admin/*,array('total' => $total,'totalPesan' => $totalPesan)*/);
        $this->load->view('admin/user/footer');
    }
             
  }


  //function profil

  function profil()
  {
       
        //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
    $admin['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
        $admin['tes'] = 1;

        $this->load->model('m_admin');
        $idAdmin = $this->session->userdata('idAdmin');

        $admin['no'] = $this->m_admin->select($idAdmin);
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login_user');
        $user = $this->session->userdata('username');
        //$admin['admin'] = $this->m_admin->count_all();
        //$admin['pesan'] = $this->m_pesan->count_all();
        

        $this->data['admin'] = $this->m_login_user->data($user);
        $this->load->view('admin/user/header',$this->data);
        $this->load->view('admin/user/index', $admin);
        $this->load->view('admin/user/footer');
    }        
  }


  function ubahPassword()
  {
    $admin['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');

    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
          $data['tes'] = 2;

          $this->load->model('m_admin');
          $idAdmin = $this->session->userdata('idAdmin');
          if($_POST==NULL) {
              $data['no'] = $this->m_admin->select($idAdmin);
              $this->load->model('m_login_user');
              $user = $this->session->userdata('username');
              
              $this->data['admin'] = $this->m_login_user->data($user);
              $this->load->view('admin/user/header',$this->data);
              $this->load->view('admin/user/index',$data);
              $this->load->view('admin/user/footer');
          }else {
              $cek = $this->input->post('password');
              $cek2 = $this->input->post('password2');

              if ($cek == $cek2) {
                $this->m_admin->updatePassword($idAdmin);
                redirect('user/welcome/logout');
              }else{
                echo "<script> alert('password tidak singkron'); </script>";
                $data['no'] = $this->m_admin->select($idAdmin);
                $this->load->model('m_login_user');
                $user = $this->session->userdata('username');
              
                $this->data['admin'] = $this->m_login_user->data($user);
                $this->load->view('admin/user/header',$this->data);
                $this->load->view('admin/user/index',$data);
                $this->load->view('admin/user/footer');
              }
              
          }
    }    
  }



  //---------------------------------------------------membuat fungsi crud tabel Admin-----------------------------------------------------------------

  function admin()
  {

    $admin['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{
        //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
        $this->load->model('m_admin');
        $admin['admin'] = $this->m_admin->selectAll();

   
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login_user');
        $user = $this->session->userdata('username');
        
        $this->data['admin'] = $this->m_login_user->data($user);
        $this->load->view('admin/user/header',$this->data);
        $this->load->view('admin/user/admin/admin', $admin);
        $this->load->view('admin/user/footer');
    }    
  }  

  function inputAdmin()
  {
    
    $admin['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{    
        $kode = 'admin';  
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login_user');
        $this->load->model('m_admin');
        $user = $this->session->userdata('username');
        $admin['kodeunik'] = $this->m_admin->getkodeunik($kode);
        
        $this->data['admin'] = $this->m_login_user->data($user);
        $this->load->view('admin/user/header',$this->data);
        $this->load->view('admin/user/admin/inputadmin',$admin);
        $this->load->view('admin/user/footer');
    }
  }
  
  function tambahAdmin()
  {
    $admin['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{    
    
        $this->load->model('m_admin');
        $this->m_admin->input();     
        redirect('admin/user/welcome/admin/admin');
    }
  }

  function deleteAdmin($idAdmin)
  {
    $admin['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{    
    
        $this->load->model('m_admin');
        $this->m_admin->delete($idAdmin);
        redirect('admin/user/welcome/admin/admin');
    }
  }
  
  function editAdmin($idAdmin) 
  {
    $admin['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{    
        $this->load->model('m_admin');
        if($_POST==NULL) {
              $data['no'] = $this->m_admin->select($idAdmin);
              $this->load->model('m_login_user');
              $user = $this->session->userdata('username');
              
              $this->data['admin'] = $this->m_login_user->data($user);
              $this->load->view('admin/user/header',$this->data);
              $this->load->view('admin/user/admin/editadmin',$data);
              $this->load->view('admin/user/footer');
        }else {
              $this->m_admin->update($idAdmin);
              redirect('admin/user/welcome/profil');
        }
    }
  }



  //---------------------------------------------------membuat fungsi crud tabel Jadwal-----------------------------------------------------------------

  function jadwal()
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
        $this->load->model('m_jadwal');
        $jadwal['jadwal'] = $this->m_jadwal->selectAll();

   
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login_user');
        $user = $this->session->userdata('username');
        
        $this->data['admin'] = $this->m_login_user->data($user);
        $this->load->view('admin/user/header',$this->data);
        $this->load->view('admin/user/jadwal/jadwal', $jadwal);
        $this->load->view('admin/user/footer');
    }    
  }  

  
  function inputJadwal()
  {
    
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{    
        $kode = 'jadwal';  
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login_user');
        $this->load->model('m_jadwal');
        $user = $this->session->userdata('username');
        $jadwal['kodeunik'] = $this->m_jadwal->getkodeunik($kode);
        
        $this->data['admin'] = $this->m_login_user->data($user);
        $this->load->view('admin/user/header',$this->data);
        $this->load->view('admin/user/jadwal/inputjadwal',$jadwal);
        $this->load->view('admin/user/footer');
    }
  }
  
  
  function tambahJadwal()
  {

    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{    
    
        $this->load->model('m_jadwal');
        $this->m_jadwal->input();     
        redirect('admin/user/welcome/jadwal/jadwal');
    }
  }

  
  function deleteJadwal($idJadwal)
  {
    $admin['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{    
    
        $this->load->model('m_jadwal');
        $this->m_jadwal->delete($idJadwal);
        echo "<script> alert('berhasil dihapus'); </script>";
        redirect('admin/user/welcome/jadwal/jadwal');
    }
  }
  
  
  function editjadwal($idJadwal) 
  {
    $admin['tes'] = 0;
    $this->load->model('m_login_user');
    $session = $this->session->userdata('Login');
    if($session !='berhasil'){
        echo "<script> alert('anda harus login terlebih dahulu'); </script>";
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }else{    
            $this->load->model('m_jadwal');
            if($_POST==NULL) {
                $data['no'] = $this->m_jadwal->select($idJadwal);
                $this->load->model('m_login_user');
                $user = $this->session->userdata('username');
                
                $this->data['admin'] = $this->m_login_user->data($user);
                $this->load->view('admin/user/header',$this->data);
                $this->load->view('admin/user/jadwal/editjadwal',$data);
                $this->load->view('admin/user/footer');
            }else {
                $this->m_jadwal->update($idJadwal);
                redirect('admin/user/welcome/jadwal/jadwal');
            }
    }
  }





  /* maaf di tutup dulu


  
	//membuat fungsi crud tabel admin

	function admin()
	{

	      //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
	      $this->load->model('m_admin');
	      $admin['admin'] = $this->m_admin->selectAll();

	 
	      //meload view bernama buku_view.php dengan data variable adalah $data
	      $this->load->model('m_login_user');
	      $user = $this->session->userdata('username');
	      
	      $this->data['admin'] = $this->m_login_user->data($user);
	      $this->load->view('user/header',$this->data);
	      $this->load->view('user/admin', $admin);
	      $this->load->view('user/footer');
	      
	}  

	function input()
	{
	      $kode = 'admin';  
	      //meload view bernama buku_view.php dengan data variable adalah $data
	      $this->load->model('m_login_user');
	      $user = $this->session->userdata('username');
	      $admin['kodeunik'] = $this->m_admin->getkodeunik($kode);
	      
	      $this->data['admin'] = $this->m_login_user->data($user);
	      $this->load->view('user/header',$this->data);
	      $this->load->view('user/inputadmin',$admin);
	      $this->load->view('user/footer');
	}
	function tambah()
	{
	      $this->load->model('m_admin');
	      $this->m_admin->input();     
	      redirect('user/welcome/admin');
	}

	function delete($idAdmin)
	{
	        $this->load->model('m_admin');
	        $this->m_admin->delete($idAdmin);
	        redirect('user/welcome/admin');
	}
	function edit($idAdmin) 
	{
	        $this->load->model('m_admin');
	        if($_POST==NULL) {
	            $data['no'] = $this->m_admin->select($idAdmin);
	            $this->load->model('m_login_user');
	            $user = $this->session->userdata('username');
	            
	            $this->data['admin'] = $this->m_login_user->data($user);
	            $this->load->view('user/header',$this->data);
	            $this->load->view('user/editadmin',$data);
	            $this->load->view('user/footer');
	        }else {
	            $this->m_admin->update($idAdmin);
	            redirect('user/welcome/admin');
	        }
	}


	//membuat fungsi crud tabel rute

	function rute()
	{

	      //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
	      $this->load->model('m_rute');
	      $rute['rute'] = $this->m_rute->selectAll();

	 
	      //meload view bernama buku_view.php dengan data variable adalah $data
	      $this->load->model('m_login_user');
	      $user = $this->session->userdata('username');
	      
	      $this->data['admin'] = $this->m_login_user->data($user);
	      $this->load->view('user/header',$this->data);
	      $this->load->view('user/rute', $rute);
	      $this->load->view('user/footer');
	      
	}  

	function inputRute()
	{
	      $kode = 'rute';  
	      //meload view bernama buku_view.php dengan data variable adalah $data
	      $this->load->model('m_login_user');
	      $user = $this->session->userdata('username');
	      $rute['kodeunik'] = $this->m_rute->getkodeunik($kode);
	      
	      $this->data['admin'] = $this->m_login_user->data($user);

	      $this->load->view('user/header',$this->data);
	      $this->load->view('user/inputrute',$rute);
	      $this->load->view('user/footer');
	}
	function tambahRute()
	{
	      $this->load->model('m_rute');
	      $this->m_rute->input();     
	      redirect('user/welcome/rute');
	}

	function deleteRute($idRute)
	{
	        $this->load->model('m_rute');
	        $this->m_rute->delete($idRute);
	        redirect('user/welcome/rute');
	}
	function editRute($idRute) 
	{
	        $this->load->model('m_rute');
	        if($_POST==NULL) {
	            $data['no'] = $this->m_rute->select($idRute);
	            $this->load->model('m_login_user');
	            $user = $this->session->userdata('username');
	            
	            $this->data['admin'] = $this->m_login_user->data($user);
	            $this->load->view('user/header',$this->data);
	            $this->load->view('user/editrute',$data);
	            $this->load->view('user/footer');
	        }else {
	            $this->m_rute->update($idRute);
	            redirect('user/welcome/rute');
	        }
	}



//membuat fungsi crud tabel rute

    function jadwal()
    {

          //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
          $this->load->model('m_jadwal');
          $jadwal['jadwal'] = $this->m_jadwal->selectAll();

     
          //meload view bernama buku_view.php dengan data variable adalah $data
          $this->load->model('m_login_user');
          $user = $this->session->userdata('username');
          
          $this->data['admin'] = $this->m_login_user->data($user);
          $this->load->view('user/header',$this->data);
          $this->load->view('user/jadwal', $jadwal);
          $this->load->view('user/footer');
          
    }  

    function inputJadwal()
    {
          $kode = 'jadwal';  
          //meload view bernama buku_view.php dengan data variable adalah $data
          $this->load->model('m_login_user');
          $user = $this->session->userdata('username');
          $jadwal['kodeunik'] = $this->m_jadwal->getkodeunik($kode);
          $jadwal['rute'] = $this->m_rute->getRute();
          
          $this->data['admin'] = $this->m_login_user->data($user);

          $this->load->view('user/header',$this->data);
          $this->load->view('user/inputjadwal',$jadwal);
          $this->load->view('user/footer');
    }
    function tambahJadwal()
    {
          $this->load->model('m_jadwal');
          $this->m_jadwal->input();     
          redirect('user/welcome/jadwal');
    }

    function deleteJadwal($idJadwal)
    {
            $this->load->model('m_jadwal');
            $this->m_jadwal->delete($idJadwal);
            redirect('user/welcome/jadwal');
    }
    function editJadwal($idJadwal) 
    {
            $this->load->model('m_jadwal');
            if($_POST==NULL) {
                $data['no'] = $this->m_jadwal->select($idJadwal);
                $this->load->model('m_login_user');
                $user = $this->session->userdata('username');
                $data['rute'] = $this->m_rute->getRute();
                
                $this->data['admin'] = $this->m_login_user->data($user);
                $this->load->view('user/header',$this->data);
                $this->load->view('user/editjadwal',$data);
                $this->load->view('user/footer');
            }else {
                $this->m_jadwal->update($idJadwal);
                redirect('user/welcome/jadwal');
            }
    }

   

//membuat fungsi crud tabel rute

    function armada()
    {

          //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
          $this->load->model('m_armada');
          $armada['armada'] = $this->m_armada->selectAll();

     
          //meload view bernama buku_view.php dengan data variable adalah $data
          $this->load->model('m_login_user');
          $user = $this->session->userdata('username');
          
          $this->data['admin'] = $this->m_login_user->data($user);
          $this->load->view('user/header',$this->data);
          $this->load->view('user/armada', $armada);
          $this->load->view('user/footer');
          
    }  

    function inputArmada()
    {
          $kode = 'armada';  
          //meload view bernama buku_view.php dengan data variable adalah $data
          $this->load->model('m_login_user');
          $user = $this->session->userdata('username');
          $armada['kodeunik'] = $this->m_armada->getkodeunik($kode);
          $armada['rute'] = $this->m_rute->getRute();
          
          $this->data['admin'] = $this->m_login_user->data($user);

          $this->load->view('user/header',$this->data);
          $this->load->view('user/inputarmada',$armada);
          $this->load->view('user/footer');
    }
    function tambahArmada()
    {
          $this->load->model('m_armada');
          $this->m_armada->input();     
          redirect('user/welcome/armada');
    }

    function deleteArmada($idArmada)
    {
            $this->load->model('m_armada');
            $this->m_armada->delete($idArmada);
            redirect('user/welcome/armada');
    }
    function editArmada($idArmada) 
    {
            $this->load->model('m_armada');
            if($_POST==NULL) {
                $data['no'] = $this->m_armada->select($idArmada);
                $this->load->model('m_login_user');
                $user = $this->session->userdata('username');
                $data['rute'] = $this->m_rute->getRute();
                
                $this->data['admin'] = $this->m_login_user->data($user);
                $this->load->view('user/header',$this->data);
                $this->load->view('user/editarmada',$data);
                $this->load->view('user/footer');
            }else {
                $this->m_armada->update($idArmada);
                redirect('user/welcome/armada');
            }
    }


    //membuat fungsi crud tabel pesan

    function daftarPesan()
    {

          //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
          $this->load->model('m_jadwal');
          $jadwal['jadwal'] = $this->m_jadwal->daftarpesan();

     
          //meload view bernama buku_view.php dengan data variable adalah $data
          $this->load->model('m_login_user');
          $user = $this->session->userdata('username');
          
          $this->data['admin'] = $this->m_login_user->data($user);
          $this->load->view('user/header',$this->data);
          $this->load->view('user/daftarpesan', $jadwal);
          $this->load->view('user/footer');
          
    }

    function pesan()
    {

          //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
          $this->load->model('m_pesan');
          $pesan['pesan'] = $this->m_pesan->selectAll();
          
     
          //meload view bernama buku_view.php dengan data variable adalah $data
          $this->load->model('m_login_user');
          $user = $this->session->userdata('username');
          
          $this->data['admin'] = $this->m_login_user->data($user);
          $this->load->view('user/header',$this->data);
          $this->load->view('user/pesan', $pesan);
          $this->load->view('user/footer');
          
    }  

    function inputPesan($idJadwal)
    {
          $this->load->model('m_pesan');
          $kode = 'pesan';  
          //meload view bernama buku_view.php dengan data variable adalah $data
          $pesan['no'] = $this->m_jadwal->select($idJadwal);
          $this->load->model('m_login_user');
          $user = $this->session->userdata('username');
          $pesan['rute'] = $this->m_rute->getRute();
          $pesan['kodeunik'] = $this->m_pesan->getkodeunik($kode);
          
          $this->data['admin'] = $this->m_login_user->data($user);

          $this->load->view('user/header',$this->data);
          $this->load->view('user/inputpesan',$pesan,$this->data);
          $this->load->view('user/footer');
    }
    function tambahPesan()
    {
          $this->load->model('m_pesan');
          $this->m_pesan->input();     
          redirect('user/welcome/pesan');
    }

    function deletePesan($idPesan)
    {
            $this->load->model('m_pesan');
            $this->m_pesan->delete($idPesan);
            redirect('user/welcome/pesan');
    }
    function editPesan($idPesan) 
    {
            $this->load->model('m_pesan');
            if($_POST==NULL) {
                $data['no'] = $this->m_pesan->select($idPesan);
                $this->load->model('m_login_user');
                $user = $this->session->userdata('username');
                $data['rute'] = $this->m_rute->getRute();
                
                $this->data['admin'] = $this->m_login_user->data($user);
                $this->load->view('user/header',$this->data);
                $this->load->view('user/editpesan',$data);
                $this->load->view('user/footer');
            }else {
                $this->m_pesan->update($idPesan);
                redirect('user/welcome/pesan');
            }
    }

  //membuat fungsi crud tabel admin

  function admin()
  {

        //memanggil function selectAll di model showbuku_model, dimasukkan ke $data['buku']
        $this->load->model('m_admin');
        $admin['admin'] = $this->m_admin->selectAll();

   
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login_user');
        $user = $this->session->userdata('username');
        
        $this->data['admin'] = $this->m_login_user->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/liatadmin', $admin);
        $this->load->view('user/footer');
        
  }  

  function inputadmin()
  {
        $kode = 'admin';  
        //meload view bernama buku_view.php dengan data variable adalah $data
        $this->load->model('m_login_user');
        $user = $this->session->userdata('username');
        $admin['kodeunik'] = $this->m_admin->getkodeunik($kode);
        
        $this->data['admin'] = $this->m_login_user->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/inputadmin',$admin);
        $this->load->view('user/footer');
  }
  function tambahadmin()
  {
        $this->load->model('m_admin');
        $this->m_admin->input();     
        redirect('user/welcome/liatadmin');
  }

  function deleteadmin($idAdmin)
  {
          $this->load->model('m_admin');
          $this->m_admin->delete($idAdmin);
          redirect('user/welcome/liatadmin');
  }
  function editadmin($idAdmin) 
  {
          $this->load->model('m_admin');
          if($_POST==NULL) {
              $data['no'] = $this->m_admin->select($idAdmin);
              $this->load->model('m_login_user');
              $user = $this->session->userdata('username');
              
              $this->data['admin'] = $this->m_login_user->data($user);
              $this->load->view('user/header',$this->data);
              $this->load->view('user/editadmin',$data);
              $this->load->view('user/footer');
          }else {
              $this->m_admin->update($idAdmin);
              redirect('user/welcome/logout');
          }
  }


  */


	
  function logout()
  {
    $this->session->unset_userdata('Login');
    redirect('admin/user/login','refresh');
  }
}
?>