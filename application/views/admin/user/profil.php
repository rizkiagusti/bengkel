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
                                  <li>Id User: <?php echo $no->idUser ?></li>
                                  <li>Nama : <?php echo $no->nama ?></li>
                                  <li>No KTP : <?php echo $no->noKtp ?></li>
                                  <li>Email : <?php echo $no->email ?></li>
                                  <li>No HP : <?php echo $no->noHp ?></li>
                                  <li>Username : <?php echo $no->username ?></li>
                                  <hr>  
                                  <a href="<?php echo base_url();?>admin/user/welcome/editUser/<?php echo $no->idUser;?>" class="btn btn-sm btn-default">Ubah <span class="glyphicon glyphicon-new-window"></span></a>
                            </font>
                            </div>
                    </div>
                    </div>
                    </div>