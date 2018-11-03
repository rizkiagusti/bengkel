<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Edit Data Armada</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi armada terbaru
            </div>
            <div class="panel-body">
            <form action="" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id Armada</th>
                            <th>:</th>
                            <th><input size=10 style="background-color: #adada8" type="text" size=50 name="idArmada" value="<?php echo $no->idArmada ?>" readonly></th>
                        </tr>

                        <tr >
                            <th>Kendaraan</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="namaKen" value="<?php echo $no->namaKen ?>"></th>
                        </tr>
                        <tr class="info">
                            <th>No Polisi</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="noPol" value="<?php echo $no->noPol ?>"></th>
                        </tr>
                        <tr >
                            <th>Jumlah Kursi</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="max" value="<?php echo $no->max ?>"></th>
                        </tr>
                        
                        <tr class="info">
                            <th>Rute Pilihan</th>
                            <th>:</th>
                            <th>
                            <?php $attributes = array("name" => "form1");  $attributes;?>
                            <?php $attributes = 'id="rute" class="form-control"';
                            echo form_dropdown('rute', $rute, set_value('rute'), $attributes); ?>
                              
                            </th>
                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Simpan"/>
            </div>
            </div>
            </div>   
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
    