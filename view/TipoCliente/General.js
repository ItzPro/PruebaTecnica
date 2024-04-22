var tabla;
var usu_id = $('#user_idx').val();


//---------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------
function init() {
    $("#nuevogeneral_form").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$(document).ready(function () {


    //---------------------------------------------------------------------------------------------------------------------------------------
    //--Mostrar Lista------------------------------------------------------------------------------------------------------------------------

    tabla = $('#tbl_general').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ajax": {
            url: '../../controller/tipocliente.php?op=listar_General',
            type: "post",
            dataType: "json",
            data: {},
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "ordering": false,
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();

});

//---------------------------------------------------------------------------------------------------------------------------------------
//--Guardar y editar---------------------------------------------------------------------------------------------------------------------

function guardaryeditar(e) {
    e.preventDefault();
    var formData = new FormData($("#nuevogeneral_form")[0]);
        $.ajax({
            url: "../../controller/tipocliente.php?op=guardaryeditar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);

                $('#nuevogeneral_form')[0].reset();
                $("#modalGeneral").modal('hide');
                $('#tbl_general').DataTable().ajax.reload();

                swal({
                    title: "Sistema!",
                    text: "Completado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });

            }
        });


}

//---------------------------------------------------------------------------------------------------------------------------------------
//--Editar-------------------------------------------------------------------------------------------------------------------------------

function editar(idTipoCliente) {
    $('#mdltitulo').html('<i class="bi bi-file-earmark-post-fill"></i> Editar tipo de cliente');
    $.post("../../controller/tipocliente.php?op=mostrar", { idTipoCliente: idTipoCliente }, function (data) {

        data = JSON.parse(data);
        $('#idTipoCliente').val(data.idTipoCliente);
        $('#codigoTipoCliente').val(data.codigoTipoCliente);
        $('#nombreTipoCliente').val(data.nombreTipoCliente);
        /* $('#tbl_rol_id_rol').val(data.tbl_rol_id_rol).trigger('change');
        $('#tbl_estado_id_estado').val(data.tbl_estado_id_estado).trigger('change'); */

    });

    $('#modalGeneral').modal('show');
}

//---------------------------------------------------------------------------------------------------------------------------------------
//--Eliminar-----------------------------------------------------------------------------------------------------------------------------
/* 
function eliminar(idTipoCliente) {
    swal({
        title: "Sistema Biblioteca",
        text: "Esta seguro de Eliminar el registro?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
        function (isConfirm) {
            if (isConfirm) {
                $.post("../../controller/tipocliente.php?op=eliminar", { idTipoCliente: idTipoCliente }, function (data) {
                });

                $('#tbl_general').DataTable().ajax.reload();

                swal({
                    title: "Sistema!",
                    text: "Registro Eliminado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            }
        });
} */

//---------------------------------------------------------------------------------------------------------------------------------------
//--Boton con funciones al hacer click---------------------------------------------------------------------------------------------------

$(document).on("click", "#btnnuevo", function () {

    $('#idTipoCliente').val('');
    $('#mdltitulo').html('<i class="bi bi-file-earmark-post-fill"></i> Agregar tipo de cliente');
    $('#nuevogeneral_form')[0].reset();
    /* limpiarCombosBoxs(".limpiarSelect"); */
    $('#modalGeneral').modal('show');
});

//---------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------

init();