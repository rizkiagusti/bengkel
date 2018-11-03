<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">Data Jadwal</h1>
<table class="table" border=1>
<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered table-hover" class="table table-striped table-bordered table-condensed ">
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
  <td><a href="<?php echo base_url();?>user/welcome/editJadwal/<?php echo $j->idJadwal;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
      <a href="<?php echo base_url();?>user/welcome/deleteJadwal/<?php echo $j->idJadwal;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
  </div>
  </div>
</div>