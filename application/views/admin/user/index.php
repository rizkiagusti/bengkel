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
                            Berikut ini mekanisme pemesanan tiket service:
                            <ol>
                                  <li>user melakukan pendataan motor</li>
                                  <li>Lakukan pilihan di menu kendaraan</li>
                                  <li>Pilih tambah kendaraan </li>
                                  <li>Selanjutnya user memilih menu tiket</li>
                                  <li>Pilih Ambil Tiket</li>
                            </font>
                            </div>
                            </div>
                            </div>
                    </div>