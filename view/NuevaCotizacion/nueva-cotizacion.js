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
    
    let cot_id      = $('#cot_id').val();    
    let cli_id      = $('#cli_id').val();
    let con_id      = $('#con_id').val();
    let cli_ci      = $('#cli_ci').val();
    let con_tel     = $('#con_tel').val();
    let con_email   = $('#con_email').val();
    let cot_descrip = $('#cot_descrip').val();    

    if(cli_id== "" || con_id== "" || cli_ci== "" || con_tel== "" || con_email== "" ){
        $.gritter.add({
            title: "Error",
            text: "Campos vacios.",
            fade: true,
            speed: "medium"
        });
    } else {
        $.ajax({
            url:"../../controller/cotizacion.php?op=guardar",
            type:"POST",
            data:{
                cot_id: cot_id,
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
                    $('#cot_id').val(data.cot_id);
                }, "500");   
                $('#mdlCarga').modal('hide');    
                console.log(data.cot_id);
            }
        });

        $('#panel1').addClass('hide');
        $('#panel2').removeClass('hide');
    }

});

$(document).on('click', '#btnagregar1', function(){
    let cot_id = $('#cot_id').val();
    let cat_id = $('#cat_id').val();
    let prod_id = $('#prod_id').val();
    let cotd_precio = $('#cotd_precio').val();
    let cotd_cant = $('#cotd_cant').val();

    if(cat_id == "" || prod_id == "" || cotd_precio == "" || cotd_cant == ""){
        $.gritter.add({
            title: "Error",
            text: "Campos vacios.",
            fade: true,
            speed: "medium"
        });
    } else {
        $.ajax({
            url:"../../controller/cotizacion.php?op=dguardar",
            type:"POST",
            data:{
                cot_id: cot_id,
                cat_id: cat_id,
                prod_id: prod_id,
                cotd_precio: cotd_precio,
                cotd_cant: cotd_cant,
            },
            dataType: "json",
            beforeSend: function () {
                $('#mdlCarga').modal('show');
            },
            success:function(data){ 
                // setTimeout(() => {
                    
                // }, "1000"); 
                listard(cot_id);
                console.log(data)
                
                $('#mdlCarga').modal('hide');    
            },
            error: function (xhr, status, error) {
                console.log('Status: ', status);
                console.log('Error: ', error);
                console.log('Response Text: ', xhr.responseText);
                $('#mdlCarga').modal('hide');    
            }
        });
    }
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

function listard(cot_id){
    console.log('recargando tabla')
    $("#table_data").DataTable ({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons:[
            "copyHtml5",
            "excelHtml5",
            "csvHtml5",
        ],
        "ajax":{
            url:"../../controller/cotizacion.php?op=listard",
            type: "post", 
            dataType: "json",
            data: {cot_id:cot_id}
        },
        "bDestroy": true,
        "responsive" : true,
        "bInfo":true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]],
        "language": {
            "sProcessing": "Procesando. . .",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfot": "Mostrando registros del _START al _END de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del e al 0 de un total de registros ",
            "sInfoFiltered": "(Filtrado de un total de _MAX registros) ",
            "sInfoPostFix": "",
            "sSearch":" Buscar: ",
            "sUr1 ": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando. . . ",
            "OPaginate": {
                "sFirst": "Primero",
                "sLast": "Ültimo",
                "sNext": "Siguiente",
                "SPrevious": "Anterior"
            },
            "oAria":{
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending" : ": Activar para ordenar 1a columna de manera descendente"
            }
        },
    });
}