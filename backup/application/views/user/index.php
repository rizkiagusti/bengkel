 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php //echo $total ?></div>
                                    <div>Jumlah Pelanggan</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>user/welcome/pelanggan">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php //echo $totalPesan ?></div>
                                    <div>Jumlah Pesanan</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>user/welcome/pesan">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> 
              
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
                            Berikut ini mekanisme pemesanan travel:
                            <ol>
                                  <li>Pegawai mendaftarkan pelanggan</li>
                                  <li>Lakukan pilihan di menu pesan</li>
                                  <li>Pilih rute yang dituju</li>
                                  <li>Pelanggan melakukan pembayaran</li>
                                  <li>Hal yang telah dibeli tidak bisa dikembalikan lagi</li>
                            </font>
                            </div>
                            </div>
                            </div>
                    </div>