<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Data Armada</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi Armada baru
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url().'user/welcome/tambahArmada' ?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Id Armada</th>
                            <th>:</th>
                            <th><input style="background-color: #adada8" type="text" size=10 name="idArmada" value="<?=$kodeunik?>" readonly></th>
                        </tr>
                        <tr >
                            <th>Kendaraan</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="namaKen"></th>
                        </tr>
                        <tr class="info">
                            <th>No Polisi</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="noPol"></th>
                        </tr>
                        <tr >
                            <th>Jumlah Kursi</th>
                            <th>:</th>
                            <th><input type="text" size=30 name="max"></th>
                        </tr>
                        <tr class="info">

                            <th>Rute Pilihan</th>
                            <th>:</th>
                            <th>
                            <?php $attributes = array("name" => "form1");
                            echo form_open("user/welcome/memilih", $attributes);?>   
                            <?php $attributes = 'id="rute" class="form-control"';
                            echo form_dropdown('rute', $rute, set_value('rute'), $attributes); ?>
                                                            </th>
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
        url: "<?php echo site_url('user/welcome/tambahArmada'); ?>",
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



    