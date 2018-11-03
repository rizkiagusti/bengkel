<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Edit Data Kendaraan</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi kendaraan terbaru
            </div>
            <div class="panel-body">
            <form action="" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id Kendaraan</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=10 name="idKen" value="<?php echo $no->idKen; ?>" readonly></th>
                        </tr>
                        <tr >
                            <th>idUser</th>
                            <th>:</th>
                            <th><input type="text" style="background-color: #adada8" size=10 name="idUser" value="<?php echo $no->idUser; ?>" readonly></th>
                        </tr>
                        <tr class="info">
                            <th>Kendaraan</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="nama" value="<?php echo $no->nama; ?>"></th>
                        </tr>
                        <tr >
                            <th>No Polisi</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="noPol" value="<?php echo $no->noPol; ?>"></th>
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
    