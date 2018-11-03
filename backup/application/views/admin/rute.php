<div class="kursus">
<h2>Daftar Rute</h2>
<table id="example" class="table table-striped table-bordered table-condensed " cellspacing="0" width="85%">
   <thead>
            <tr class="danger">
                <th>No</th>
                <th width=50%>Rute Pilihan</th>
                <th width=30%>Harga</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($rute as $p): ?>

            <tr">
                <td><?php echo $no++?></td>
                <td><?php echo $p->rutePP ?></td>
                <td>Rp. <?php echo $p->harga ?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>