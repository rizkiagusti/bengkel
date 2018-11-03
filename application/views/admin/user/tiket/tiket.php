<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">Data Keberangkatan</h1>
<table class="table" border=1>
<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover">
<thead>
  <tr class="progress-bar-info">
     <th>No</th>
     <th>tanggal</th>
     <th>Kuota</th>
     <th>Aksi</th> 
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach ($jadwal->result() as $j): ?>
  <tr>  
  <td><?php echo $no++?></td>
  <td><?php echo $j->tgl ?></td>
  <td><?php echo $j->kuota ?></td>
  <td>
    <?php if ($j->kuota ==0){
  echo '<a href="<?php echo base_url();?>admin/user/welcome/inputTiket/<?php echo $j->idJadwal;?>" disabled="disabled" class="btn btn-sm btn-default">Locked <span class="glyphicon glyphicon-remove-sign">';}
  else{?>
  <a href="<?php echo base_url();?>admin/user/welcome/inputTiket/<?php echo $j->idJadwal;?>" class="btn btn-sm btn-default">Pesan <span class="glyphicon glyphicon-new-window"></span></a>
  <?php }?>
  </td>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
  </div>
  </div>
</div>