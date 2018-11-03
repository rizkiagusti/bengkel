<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">Data Armada Travel</h1>
<table class="table" border=1>
<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered table-hover">
<thead>
  <tr class="progress-bar-info">
     <th>No</th>
     <th>Kendaran</th>
     <th>Nomer Polisi</th>
     <th>Jumlah Kursi</th>
     <th>Jurusan</th>
     <th>Aksi</th> 
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach ($armada->result() as $j): ?>
  <tr>  
  <td><?php echo $no++?></td>
  <td><?php echo $j->namaKen ?></td>
  <td><?php echo $j->noPol ?></td>
  <td><?php echo $j->max ?></td>
  <td><?php echo $j->rutePP ?></td>
  <td><a href="<?php echo base_url();?>user/welcome/editArmada/<?php echo $j->idArmada;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
      <a href="<?php echo base_url();?>user/welcome/deleteArmada/<?php echo $j->idArmada;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
  </div>
  </div>
</div>