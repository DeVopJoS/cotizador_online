$(document).ready( function() {

    $('#panel2').addClass('hide');
    $('#panel3').addClass('hide');
    $('#panel4').addClass('hide');

    $("#cli_id").select2({ placeholder: "Seleccionar" });
    
    $("#cat_id").select2({ placeholder: "Seleccionar" });
    
    $("#prod_id").select2({ placeholder: "Seleccionar" });

    $("#prod_id_a").select2({ placeholder: "Seleccionar" });

    $("#cat_id_a").select2({ placeholder: "Seleccionar" });
    
    $.post("../../controller/cliente.php?op=combo", function(data) {
        $('#cli_id').html(data);
    });

    $.post("../../controller/categoria.php?op=combo", function(data) {
        $('#cat_id').html(data);
        $('#cat_id_a').html(data);
    });

    $("#cli_id").change( function() {
        $("#cli_id option:selected").each( function() {
            const cli_id = $(this).val();
            $.post("../../controller/contacto.php?op=combo_cliente", {cli_id:cli_id}, function(data) {
                $('#con_id').html(data);
            });
            
            $.post("../../controller/cliente.php?op=mostrar",{cli_id:cli_id}, function(data){
                data = JSON.parse(data);
                $("#cli_ruc").val(data.cli_ruc);
            });
        });
    });

    $("#con_id").change(function (){
        $("#con_id option:selected").each(function(){
            const con_id = $(this).val();
            $.post("../../controller/contacto.php?op=mostrar",{con_id:con_id}, function(data){
                data = JSON.parse(data);
                $("#con_tel").val(data.con_tel);
                $("#con_correo").val(data.con_correo);
            });
        });
    });

    $("#cat_id").change(function (){
        $("#cat_id option:selected").each(function(){
            const cat_id = $(this).val();
            $.post("../../controller/producto.php?op=combo_x_categoria",{cat_id:cat_id}, function(data){
                $('#prod_id').html(data);
            });
        });
    });

    $("#cat_id_a").change(function (){
        $("#cat_id_a option:selected").each(function(){
            const cat_id = $(this).val();
            $.post("../../controller/producto.php?op=combo_x_categoria",{cat_id:cat_id}, function(data){
                $('#prod_id_a').html(data);
            });
        });
    });

    $("#prod_id").change(function (){
        $("#prod_id option:selected").each(function(){
            const prod_id = $(this).val();
            $.post("../../controller/producto.php?op=mostrar", {prod_id: prod_id}, function(data){
                data = JSON.parse(data);
                $('#cotd_precio').val(data.prod_precio);
            });
        });
    });

    $("#prod_id_a").change(function (){
        $("#prod_id_a option:selected").each(function(){
            const prod_id = $(this).val();
            $.post("../../controller/producto.php?op=mostrar", {prod_id: prod_id}, function(data){
                data = JSON.parse(data);
                $('#cotd_precio_a').val(data.prod_precio);
            });
        });
    });
});
  
$(document).on('click', '#btnsiguiente1', function(){
    $('#panel1').addClass('hide');
    $('#panel2').removeClass('hide');

    var cli_id      = $('#cli_id').val();
    var con_id      = $('#con_id').val();
    var cli_ci      = $('#cli_ci').val();
    var con_tel     = $('#con_tel').val();
    var con_email   = $('#con_email').val();
    var cot_descrip = $('#cot_descrip').val();    

    $.ajax({
        url:"../../controller/cotizacion.php?op=guardar",
        type:"POST",
        data:{
            cli_id: cli_id,
            con_id: con_id,
            cli_ci: cli_ci,
            con_tel: con_tel,
            con_email: con_email,
            cot_descrip: cot_descrip
        },
        dataType: "json",
        success:function(data){
            $('#mdlCarga').modal('show');
            setTimeout(() => {
                
            }, "2000");   
            $('#mdlCarga').modal('hide');         
        }
    });
});

$(document).on('click', '#btnsiguiente2', function(){
    $('#panel2').addClass('hide');
    $('#panel3').removeClass('hide');
});

$(document).on('click', '#btnsiguiente3', function(){
    $('#panel3').addClass('hide');
    $('#panel4').removeClass('hide');
});

$(document).on('click', '#btnanterior2', function(){
    $('#panel2').addClass('hide');
    $('#panel1').removeClass('hide');
});

$(document).on('click', '#btnanterior3', function(){
    $('#panel3').addClass('hide');
    $('#panel2').removeClass('hide');
});

$(document).on('click', '#btnanterior4', function(){
    $('#panel4').addClass('hide');
    $('#panel3').removeClass('hide');
});