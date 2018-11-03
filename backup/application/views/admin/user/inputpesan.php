<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Input Pesan</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi Pesan Keberangkaan
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url().'user/welcome/tambahPesan' ?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id Pesan</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=10 name="idPesan" value="<?=$kodeunik?>" readonly></th>
                        </tr>
                        <tr >
                            <th>id Pegawai</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=30 name="idPegawai" value="<?php echo $pegawai->idPegawai; ?>" readonly></th>
                        </tr>
                        <tr class="info">
                            <th>Id Rute</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=30 name="idRute" value="<?php echo $no->idRute ?>" readonly></th>
                        </tr>

                        <tr>
                            <th>Id Pelanggan</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="idPelanggan"></th>
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
<script src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>" type="text/javascript"></script>
<script type="text/javascript">
$('#rute').change(function(){
    var idRute = $(this).val();
    $("#rute > option").remove();
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('user/welcome/tambahJadwal'); ?>",
        data: {id: idRute},
        dataType: 'json',
        success:function(data){
            $.each(data,function(k, v){
                var opt = $('<option />');
                opt.val(k);
                opt.text(v);
                $('#state').append(opt);
            });
            $('#city').html('<option value="0">Select City</option>');
            //$('#state').append('<option value="' + id + '">' + name + '</option>');
        }
    });
});


</script>



    