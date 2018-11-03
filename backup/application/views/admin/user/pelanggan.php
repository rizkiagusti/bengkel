<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">Data Pelanggan Travel</h1>
<table class="table" border=1>
<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered table-hover">
<thead>
  <tr class="progress-bar-info">
     <th>No</th>
     <th>Nama Pelanggan</th>
     <th>No KTP</th>
     <th>Aksi</th> 
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach ($pelanggan as $p): ?>
  <tr>  
  <td><?php echo $no++?></td>
  <td><?php echo $p->nama ?></td>
  <td><?php echo $p->noKtp ?></td>
  <td><a href="<?php echo base_url();?>user/welcome/edit/<?php echo $p->idPelanggan;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
      <a href="<?php echo base_url();?>user/welcome/delete/<?php echo $p->idPelanggan;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
  </div>
  </div>
</div>