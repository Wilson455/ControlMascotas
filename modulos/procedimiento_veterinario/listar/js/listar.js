$(document).ready(function () {
    listarProcedimientoVeterinario();
    $('#listarProcedimientoVeterinario').DataTable({
        destroy: true,
        ordering: false,
        searching: false,
        bLengthChange: false,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });

    function listarProcedimientoVeterinario() {  
        $.ajax({
            url: "../../../controller/CapturaInformacionController.php",
            type: "POST",
            datatype: "xml",
            async: false,
            data: ({
                'metodo': 'listarProcedimientoVeterinario',
                'idMascota': $("#idMascota").val(),
            }),
            success: function (xml) {
                $(xml).find('registro').each(function () {
                    if ($(this).text() == 'NOEXITOSO') {
                        $("#listarProcedimientoVeterinario").dataTable().fnClearTable();
                    } else {
                        $("#listarProcedimientoVeterinario").dataTable({destroy: true,}).fnAddData([
                            $(this).attr('Id'),
                            $(this).attr('NombreProcedimiento'),
                            $(this).attr('FechaProcedimiento'),
                            '<button class="btn btn-primary" onclick="editar(' + $(this).attr('Id') + ')">Editar</button>'
                        ]);
                    }
                });
            }
        });
    }
});
function registrar() {
    window.location = "../registrar/registrar.php";
}
function editar(idProcedimientoVeterinario) {
    window.location = '../actualizar/actualizar.php?idProcedimientoVeterinario=' + idProcedimientoVeterinario;
}