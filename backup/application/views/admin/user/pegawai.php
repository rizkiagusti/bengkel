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
                                    <div class="huge"><?php echo $pelanggan ?></div>
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
                                    <div class="huge"><?php echo $pesan ?></div>
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
            <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-primary">
                            <div class="panel-heading">
                            Selamat Datang -> <?php echo $this->session->userdata('nama');?>
                            </div>
                            <div class="panel-body">
                            <font color=#00796B size="5">
                            
                            Profil :
                            <tr><ol>
                                  <li>Id Pegawai: <?php echo $no->idPegawai ?></li>
                                  <li>Nama : <?php echo $no->nama ?></li>
                                  <li>Username : <?php echo $no->username ?></li>
                                  <li>Email : <?php echo $no->email ?></li>
                                  <li>Password : <a href="<?php echo base_url();?>user/welcome/editPegawai/<?php echo $no->idPegawai;?>" class="btn btn-sm btn-default">Ubah <span class="glyphicon glyphicon-new-window"></span></a></li>
                            </font>
                            </div>
                            </div>
                            </div>
                    </div>