<!DOCTYPE html>
<html>
<head>
    <title>CodeIgniter AJAX Dynamic Dependent Dropdowns Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
    </style>
</head>
<body>

<div class="container" style="margin-top: 30px;">
<div class="col-sm-6 col-sm-offset-3">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Dynamic pelanggan, State & City Dropdown List Demo</h3></div>
        <div class="panel-body">
            <?php $attributes = array("name" => "idRute");
            echo form_open("dropdown_demo/index", $attributes);?>
            <div class="form-group">
                <?php $attributes = 'id="pelanggan" class="form-control"';
                echo form_dropdown('pelanggan', $pelanggan, set_value('Pelanggan'), $attributes); ?>
            </div>

            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-info btn-block">Submit</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
<script src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>" type="text/javascript"></script>
<script type="text/javascript">
$('#pelanggan').change(function(){
    var idPelanggan = $(this).val();
    $("#state > option").remove();
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('dropdown_demo/populate_state'); ?>",
        data: {idPelanggan: idPelanggan},
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
</body>
</html>