let tabla;

function init() {
    $("#mnt_form").on("submit", (e) => {
        guardaryeditar(e);
    });
}

function guardaryeditar(e){
    e.preventDefault();
    let formData = new FormData($("#mnt_form")[0]);
    $.ajax({
        url:"../../controller/contacto.php?op=guardaryeditar",
        type:"POST",
        data:formData,
        contentType:false,
        processData:false,
        success:function(data){
            $("#mdlMnt").modal("hide");
            $('#mdlCarga').modal('show');
            setTimeout(() => {
                $('#table_data').DataTable().ajax.reload();
                $("#mnt_form")[0].reset();  
                $('#mdlCarga').modal('hide');
                $.gritter.add({
                    title: "Success",
                    text: "Registro guardado.",
                    fade: true,
                    speed: "medium"
                });
            }, "3000");
        }
    });
}

function eliminar(con_id){   
    swal({
        title: 'Esta seguro?',
        text: 'Esta seguro de eliminar el registro!',
        icon: 'error',
        buttons: {
            cancel: {
                text: 'Cancelar',
                value: null,
                visible: true,
                className: 'btn btn-default',
                closeModal: true,
            },
            confirm: {
                text: 'Eliminar',
                value: true,
                visible: true,
                className: 'btn btn-danger',
                closeModal: true
            }
        }
    }).then((isConfirm) => {
        if(isConfirm) {
            $.post("../../controller/contacto.php?op=eliminar",{con_id:con_id}, function(data){
                $('#mdlCarga').modal('show');
                setTimeout(() => {
                    $('#table_data').DataTable().ajax.reload();
                    $.gritter.add({
                        title: "Success",
                        text: "Registro eliminado con exito!",
                        fade: true,
                        speed: "medium"
                    });
                    $('#mdlCarga').modal('hide');
                }, "3000");
            });
        }
    });
}

function editar(con_id){
    $.post("../../controller/contacto.php?op=mostrar",{con_id:con_id}, function(data){
        data = JSON.parse(data);
        $("#con_id").val(data.con_id);
        $("#con_nom").val(data.con_nom);
        $("#con_correo").val(data.con_correo);
        $("#con_tel").val(data.con_tel);

        $("#car_id").val(data.car_id).trigger("change");
        $("#cli_id").val(data.cli_id).trigger("change");
    });
    $("#mdlTitulo").html("Editar registro");
    $("#mdlMnt").modal("show")
}

$(document).ready( () => {

    $("#car_id").select2({ placeholder: "Seleccionar" });
    $("#cli_id").select2({ placeholder: "Seleccionar" });

    $.post("../../controller/cargo.php?op=combo", (data) => {
        $('#car_id').html(data);
    });

    $.post("../../controller/cliente.php?op=combo", (data) => {
        $('#cli_id').html(data);
    });

    tabla = $("#table_data").DataTable ({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons:[
            "copyHtml5",
            "excelHtml5",
            "csvHtml5",
        ],
        "ajax":{
            url:"../../controller/contacto.php?op=listar",
            type: "post"
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
});

$(document).on('click', '#btnNuevo', () => {
    $("#mnt_form")[0].reset();  
    $("#con_id").val("");
    $("#car_id").val("").trigger("change");
    $("#cli_id").val("").trigger("change");
    $('#mdlTitulo').html('Nuevo registro');
    $('#mdlMnt').modal('show');
});

init();