let tabla;

function init() {

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
            url:"../../controller/categoria.php?op=listar",
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
    $('#mdlMnt').modal('show');
});

init();