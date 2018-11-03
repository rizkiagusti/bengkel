<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form User</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi user baru
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url().'user/welcome/tambahUser' ?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id User</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=10 name="idUser" value="<?=$kodeunik?>" readonly></th>
                        </tr>
                        <tr >
                            <th>Nomer Ktp</th>
                            <th>:</th>
                            <th><input type="text" size=20 name="noKtp" maxlength="20"></th>
                        </tr>
                        <tr class="info">
                            <th>Nama</th>
                            <th>:</th>
                            <th><input type="text" name="nama" size=30 maxlength="30"></th>
                        </tr>
                        <tr >
                            <th>Email</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="email" maxlength="30"></th>
                        </tr>
                        <tr class="info">
                            <th>Nomer HandPhone</th>
                            <th>:</th>
                            <th><input type="text" name="noHp" size=15 maxlength="15"></th>
                        </tr>
                        <tr >
                            <th>Username</th>
                            <th>:</th>
                            <th><input type="text" size=20 name="username" maxlength="20"></th>
                        </tr>
                        <tr class="info">
                            <th>Password</th>
                            <th>:</th>
                            <th><input type="text" name="password" size=20 maxlength="20"></th>
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
    