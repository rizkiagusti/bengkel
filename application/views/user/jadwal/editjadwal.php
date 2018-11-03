<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Edit Jadwal</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi jadwal terbaru
            </div>
            <div class="panel-body">
            <form action="" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id Jadwal</th>
                            <th>:</th>
                            <th><input size=10 style="background-color: #adada8" type="text" size=50 name="idJadwal" value="<?php echo $no->idJadwal ?>" readonly></th>
                        </tr>
                        <tr >
                            <th>Tanggal</th>
                            <th>:</th>
                            <th><input type="date"  name="tgl" value="<?php echo $no->tgl ?>"></th>
                        </tr>
                        <tr >
                            <th>Kuota</th>
                            <th>:</th>
                            <th><input type="text" size=10 name="kuota" value="<?php echo $no->kuota ?>"></th>
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
    