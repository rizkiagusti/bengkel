<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Pelanggan</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi pelanggan baru
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url().'user/welcome/tambah' ?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id Pelanggan</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=10 name="idPelanggan" value="<?=$kodeunik?>" readonly></th>
                        </tr>
                        <tr >
                            <th>Nama Pelanggan</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="nama"></th>
                        </tr>
                        <tr class="info">
                            <th>Nomer Ktp</th>
                            <th>:</th>
                            <th><input type="text" name="noKtp" size=15></th>
                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Simpan" name="submit"/>
            </div>
            </div>
            </div>   
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
    