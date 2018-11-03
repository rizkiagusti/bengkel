<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">Data Tiket</h1>
<table class="table" border=1>
<div class="table-responsive">
   <table id="example" class="table table-striped table-bordered table-hover">
<thead>
  <tr class="progress-bar-info">
     <th>No</th>
     <th>nama</th>
     <th>tanggal</th>
     <th>urutan</th>
     <th>Aksi</th> 
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach ($tiket->result() as $t): ?>
  <tr>  
  <td><?php echo $no++?></td>
  <td><?php echo $t->nama ?></td>
  <td><?php echo $t->tgl ?></td>
  <td><?php echo $t->tiket ?></td>
  <td>
   <a href="" class="btn btn-sm btn-default">Print </span></a>
  </td>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
  </div>
  </div>
</div>