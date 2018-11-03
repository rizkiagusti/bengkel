<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Data Jadwal</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi Jadwal baru
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url().'user/welcome/tambahJadwal' ?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id Jadwal</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=10 name="idJadwal" value="<?=$kodeunik?>" readonly></th>
                        </tr>
                        <tr >
                            <th>Tanggal</th>
                            <th>:</th>
                            <th><input type="date" size=30 name="tgl"></th>
                        </tr>
                        <tr >
                            <th>Kuota</th>
                            <th>:</th>
                            <th><input type="text" size=9 name="kuota"></th>
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



    