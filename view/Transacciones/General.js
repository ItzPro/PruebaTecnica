var tabla;
var usu_id = $('#user_idx').val();


//---------------------------------------------------------------------------------------------------------------------------------------
//--Limpia Combobox----------------------------------------------------------------------------------------------------------------------
const limpiarCombosBoxs = (className) => {
    // ---- Busca todos los select que posean la clase "ClassName" y se encarga de reiniciar los valores de los combos boxs ----------------
    $(className).select2("val", "0");
}
//---------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------
function init() {
    $("#nuevogeneral_form").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$(document).ready(function () {

    //---------------------------------------------------------------------------------------------------------------------------------------
    //--Combobox-----------------------------------------------------------------------------------------------------------------------------

    $.post("../../controller/motivotransaccion.php?op=combo", function (data, status) {
        $('#tbl_combo_general').html(data);

    });


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
            url: '../../controller/motivotransaccion.php?op=listar_General',
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
            url: "../../controller/motivotransaccion.php?op=guardaryeditar",
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

function editar(idMotivoTransaccion) {
    $('#mdltitulo').html('<i class="bi bi-file-earmark-post-fill"></i> Modal Editar Usuario');
    $.post("../../controller/motivotransaccion.php?op=mostrar", { idMotivoTransaccion: idMotivoTransaccion }, function (data) {

        data = JSON.parse(data);
        $('#idMotivoTransaccion').val(data.idMotivoTransaccion);
        $('#tbl_combo_general').val(data.idTipoTransaccion).trigger('change');
        $('#codigoMotivoTransaccion').val(data.codigoMotivoTransaccion);
        $('#nombreMotivoTransaccion').val(data.nombreMotivoTransaccion);
        
        

    });

    $('#modalGeneral').modal('show');
}

//---------------------------------------------------------------------------------------------------------------------------------------
//--Eliminar-----------------------------------------------------------------------------------------------------------------------------
/* 
function eliminar(idMotivoTransaccion) {
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
                $.post("../../controller/motivotransaccion.php?op=eliminar", { idMotivoTransaccion: idMotivoTransaccion }, function (data) {
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

    $('#idMotivoTransaccion').val('');
    $('#mdltitulo').html('<i class="bi bi-file-earmark-post-fill"></i> Agregar Un Nuevo Usuario');
    $('#nuevogeneral_form')[0].reset();
    limpiarCombosBoxs(".limpiarSelect");
    $('#modalGeneral').modal('show');
});

//---------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------

init();