<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Edit Data Pelanggan</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi pelanggan baru
            </div>
            <div class="panel-body">
            <form action="" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id Pelanggan</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=50 name="idPelanggan" value="<?php echo $no->idPelanggan ?>" readonly></th>
                        </tr>
                        <tr >
                            <th>Nama Pelanggan</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="nama" value="<?php echo $no->nama ?>"></th>
                        </tr>
                        <tr class="info">
                            <th>Nomer Ktp</th>
                            <th>:</th>
                            <th><input type="text" name="noKtp" size=50 value="<?php echo $no->noKtp ?>"></th>
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
    