<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">Daftar Pesanan</h1>
<table class="table" border=1>
<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered table-hover">
<thead>
  <tr class="progress-bar-info">
     <th>No</th>
     <th>Id Pesan</th>
     <th>Id pelanggan</th>
     <th>Nama Pelanggan</th>
     <th>Id Pegawai</th>
     <th>Id Rute</th>
     <th>Tgl Berangkat</th>
     <th>Aksi</th> 
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach ($pesan->result() as $po): ?>
  <tr>  
  <td><?php echo $no++?></td>
  <td><?php echo $po->idPesan ?></td>
  <td><?php echo $po->idPelanggan ?></td>
  <td><?php echo $po->nama ?></td>
  <td><?php echo $po->idPegawai ?></td>
  <td><?php echo $po->rutePP ?></td>
  <td><?php echo $po->tgl ?></td>
  <td>
      <a href="<?php echo base_url();?>user/welcome/deletePesan/<?php echo $po->idPesan;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>

  </div>
  </div>
</div>