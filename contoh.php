<?php if ($tes == 1 ) { ?>
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
                                  <li>Id Admin: <?php echo $no->idAdmin ?></li>
                                  <li>Nama : <?php echo $no->nama ?></li>
                                  <li>No KTP : <?php echo $no->noKtp ?></li>
                                  <li>Email : <?php echo $no->email ?></li>
                                  <li>No HP : <?php echo $no->noHp ?></li>
                                  <li>Username : <?php echo $no->username ?></li>
                                  <hr>  
                                  <a href="<?php echo base_url();?>user/welcome/editAdmin/<?php echo $no->idAdmin;?>" class="btn btn-sm btn-default">Ubah <span class="glyphicon glyphicon-new-window"></span></a>
                            </font>
                            </div>
                            </div>
                            </div>
                    </div>
            <?php
            } elseif ($tes == 2) {
            ?>
                    <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                    Silahkan mengisi password baru
                    </div>
                    <div class="panel-body">
                    <form action="" method="post">
                    <div class="form-group">
                    <table class="table" border=1>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr >
                                    <th>Password</th>
                                    <th>:</th>
                                    <th><input type="text" size=20 name="password" maxlength="20"></th>
                                </tr>
                                <tr class="info">
                                    <th>Password</th>
                                    <th>:</th>
                                    <th><input type="password" name="password" size=20 maxlength="20"></th>
                                </tr>
                            </thead>
                        </table>
                    </div><hr>
                             <input type="submit" class="btn btn-primary" value="Simpan"/>
                    </div>
                    </div>
                    </div>   
                    </div>
                    </div>
            <?php
            } ?>    