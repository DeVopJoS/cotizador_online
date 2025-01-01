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
        url:"../../controller/empresa.php?op=guardaryeditar",
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

function eliminar(emp_id){   
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
            $.post("../../controller/empresa.php?op=eliminar",{emp_id:emp_id}, function(data){
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

function editar(emp_id){
    $.post("../../controller/empresa.php?op=mostrar",{emp_id:emp_id}, function(data){
        data = JSON.parse(data);
        $("#emp_id").val(data.emp_id);
        $("#emp_nom").val(data.emp_nom);
        $("#emp_porcen").val(data.emp_porcen);
    });
    $("#mdlTitulo").html("Editar registro");
    $("#mdlMnt").modal("show")
}

$(document).ready( () => {
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
            url:"../../controller/empresa.php?op=listar",
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
    $('#mdlTitulo').html('Nuevo registro');
    $('#mdlMnt').modal('show');
});

init();