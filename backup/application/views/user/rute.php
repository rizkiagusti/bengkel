<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">Data rute Travel</h1>
<table class="table" border=1>
<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered table-hover">
<thead>
  <tr class="progress-bar-info">
     <th>No</th>
     <th>Rute</th>
     <th>Harga</th>
     <th>Aksi</th> 
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach ($rute as $p): ?>
  <tr>  
  <td><?php echo $no++?></td>
  <td><?php echo $p->rutePP ?></td>
  <td>Rp. <?php echo $p->harga ?></td>
  <td><a href="<?php echo base_url();?>user/welcome/editrute/<?php echo $p->idRute;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
      <a href="<?php echo base_url();?>user/welcome/deleterute/<?php echo $p->idRute;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
  </div>
  </div>
</div>