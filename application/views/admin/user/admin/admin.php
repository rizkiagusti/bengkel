<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">Data Admin</h1>
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
  foreach ($admin as $a): ?>
  <tr>  
  <td><?php echo $no++?></td>
  <td><?php echo $a->nama ?></td>
  <td><?php echo $a->noKtp ?></td>
  <td><?php echo $a->email ?></td>
  <td><?php echo $a->noHp ?></td>
  
  
  <td><a href="<?php echo base_url();?>user/welcome/deleteAdmin/<?php echo $a->idAdmin;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
  </div>
  </div>
</div>