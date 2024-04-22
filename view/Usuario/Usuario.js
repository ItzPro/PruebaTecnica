var tabla;
var usu_id = $('#user_idx').val();


//---------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------
function init() {
    $("#nuevoUsuario_form").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$(document).ready(function () {


    //---------------------------------------------------------------------------------------------------------------------------------------
    //--Mostrar Lista------------------------------------------------------------------------------------------------------------------------

    tabla = $('#tbl_usuario').dataTable({
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
            url: '../../controller/Usuario.php?op=listar_Usuario',
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
    var formData = new FormData($("#nuevoUsuario_form")[0]);
        $.ajax({
            url: "../../controller/Usuario.php?op=guardaryeditar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);

                $('#nuevoUsuario_form')[0].reset();
                $("#modalUsuario").modal('hide');
                $('#tbl_usuario').DataTable().ajax.reload();

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

function editar(idUsuario) {
    $('#mdltitulo').html('<i class="bi bi-file-earmark-post-fill"></i> Editar usuario');
    $.post("../../controller/Usuario.php?op=mostrar", { idUsuario: idUsuario }, function (data) {

        data = JSON.parse(data);
        $('#idUsuario').val(data.idUsuario);
        $('#codigoUsuario').val(data.codigoUsuario);
        $('#nombreUsuario').val(data.nombreUsuario);
        $('#passwordUsuario').val(data.passwordUsuario);
        $('#isActivo').val(data.isActivo);
        /* $('#tbl_rol_id_rol').val(data.tbl_rol_id_rol).trigger('change');
        $('#tbl_estado_id_estado').val(data.tbl_estado_id_estado).trigger('change'); */

    });

    $('#modalUsuario').modal('show');
}

//---------------------------------------------------------------------------------------------------------------------------------------
//--Eliminar-----------------------------------------------------------------------------------------------------------------------------

function eliminar(idUsuario) {
    swal({
        title: "Prueba Técnica",
        text: "¿Está seguro de eliminar el registro?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Sí",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
        function (isConfirm) {
            if (isConfirm) {
                $.post("../../controller/Usuario.php?op=eliminar", { idUsuario: idUsuario }, function (data) {
                });

                $('#tbl_usuario').DataTable().ajax.reload();

                swal({
                    title: "Sistema!",
                    text: "Registro Eliminado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            }
        });
}

//---------------------------------------------------------------------------------------------------------------------------------------
//--Boton con funciones al hacer click---------------------------------------------------------------------------------------------------

$(document).on("click", "#btnnuevo", function () {

    $('#idUsuario').val('');
    $('#mdltitulo').html('<i class="bi bi-file-earmark-post-fill"></i> Agregar un nuevo usuario');
    $('#nuevoUsuario_form')[0].reset();
    /* limpiarCombosBoxs(".limpiarSelect"); */
    $('#modalUsuario').modal('show');
});

//---------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------

init();