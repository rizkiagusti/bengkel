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
     <th>nomer polisi</th>
     <th>Nama KEndaraan</th>
     <th>Aksi</th> 
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach ($kendaraan->result() as $k): ?>
  <tr>  
  <td><?php echo $no++?></td>
  <td><?php echo $k->noPol ?></td>
  <td><?php echo $k->nama ?></td>
  
  <td><a href="<?php echo base_url();?>admin/user/welcome/editKendaraan/<?php echo $k->idKen;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
      <a href="<?php echo base_url();?>admin/user/welcome/deleteKendaraan/<?php echo $k->idKen;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
  </div>
  </div>
</div>