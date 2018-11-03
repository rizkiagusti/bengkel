<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">Data User</h1>
<table class="table" border=1>
<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered table-hover">
<thead>
  <tr class="progress-bar-info">
     <th>No</th>
     <th>Nama Admin</th>
     <th>No KTP</th>
     <th>Email</th>
     <th>No HP</th>


     <th>Aksi</th> 
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach ($user as $u): ?>
  <tr>  
  <td><?php echo $no++?></td>
  <td><?php echo $u->nama ?></td>
  <td><?php echo $u->noKtp ?></td>
  <td><?php echo $u->email ?></td>
  <td><?php echo $u->noHp ?></td>
  
  
  <td><a href="<?php echo base_url();?>user/welcome/deleteUser/<?php echo $u->idUser;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
  </div>
  </div>
</div>