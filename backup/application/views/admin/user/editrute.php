<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Edit Data Rute</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi rute terbaru
            </div>
            <div class="panel-body">
            <form action="" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id rute</th>
                            <th>:</th>
                            <th><input size=10 style="background-color: #adada8" type="text" size=50 name="idRute" value="<?php echo $no->idRute ?>" readonly></th>
                        </tr>
                        <tr >
                            <th>Nama rute</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="rutePP" value="<?php echo $no->rutePP ?>"></th>
                        </tr>
                        <tr class="info">
                            <th>Harga</th>
                            <th>:</th>
                            <th><input size="2" type="text" value="Rp." readonly ><input type="text" name="harga" size=20 value="<?php echo $no->harga ?>"></th>
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
    