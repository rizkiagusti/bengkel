<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Data Rute</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi Rute baru
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url().'user/welcome/tambahRute' ?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id Rute</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=10 name="idRute" value="<?=$kodeunik?>" readonly></th>
                        </tr>
                        <tr >
                            <th>Jurusan</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="rutePP"></th>
                        </tr> 
                        <tr class="info">
                            <th>Harga</th>
                            <th>:</th>
                            <th><input size="2" type="text" value="Rp." readonly ><input type="text" name="harga" size=20/th>
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
    