<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Edit Data User</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi User baru
            </div>
            <div class="panel-body">
            <form action="" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id User</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=5 name="idUser" value="<?php echo $no->idUser ?>" readonly></th>
                        </tr>
                        <tr >
                            <th>Nomer Ktp</th>
                            <th>:</th>
                            <th><input type="text" size=20 name="noKtp" maxlength="20" value="<?php echo $no->noKtp ?>"></th>
                        </tr>
                        <tr class="info">
                            <th>Nama</th>
                            <th>:</th>
                            <th><input type="text" name="nama" size=30 maxlength="30" value="<?php echo $no->nama ?>"></th>
                        </tr>
                        <tr >
                            <th>Email</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="email" maxlength="30" value="<?php echo $no->email ?>"></th>
                        </tr>
                        <tr class="info">
                            <th>Nomer HandPhone</th>
                            <th>:</th>
                            <th><input type="text" name="noHp" size=15 maxlength="15" value="<?php echo $no->noHp ?>"></th>
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
    