 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <?php if ($tes == 1 ) {
                include "profil.php";
            } elseif ($tes == 2) {
                include "ubahPassword.php";
            } ?>    
            
            <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-primary">
                            <div class="panel-heading">
                            Selamat Datang <?php echo $this->session->userdata('nama');?>
                            </div>
                            <div class="panel-body">
                            <font color=#00796B>
                            Berikut ini mekanisme pendaftaran pelanggan:
                            <ol>
                                  <li>Admin masuk ke menu user</li>
                                  <li>Lakukan pilihan di menu tambah user</li>
                                  <li>Isi data dengan lengkap</li>
                                  <li>Lalu simpan dengan klik simpan</li>
                                  <li>Pelanggan melakukan pembayaran pendaftaran Rp 10.000</li>
                                  
                            </font>
                            </div>
                            </div>
                            </div>
                    </div>