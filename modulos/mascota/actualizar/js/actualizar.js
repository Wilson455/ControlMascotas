$(document).ready(function () {
    
    consultarMascota();

    $('.tablaActualizar').DataTable({
        destroy: true,
        ordering: false,
        bLengthChange: false,
        searching: false,
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
    
    function consultarMascota() {
        $.ajax({
            url: "../../../controller/CapturaInformacionController.php",
            type: "POST",
            datatype: "xml",
            data: ({
                'metodo': 'consultarMascota',
                'idMascota': $("#id").val()
            }),
            success: function (xml) {
                $(xml).find('registro').each(function () {
                    if ($(this).text() == 'NOEXITOSO') {
                        $("#Estado").html("");
                    } else {
                        $("#nombre").val($(this).attr('Nombre'));
                        $("#edad").val($(this).attr('Edad'));
                        $("#tipo").val($(this).attr('Tipo'));
                        $("#rasgosFisicos").val($(this).attr('RasgosFisicos'));
                        $("#tipoAlimento").val($(this).attr('TipoAlimento'));
                    }
                });
            }
        });
    }
});

function controlMedico() {
    var idMascota = $("#id").val();
    window.location = '../../control_medico/listar/listar.php?idMascota=' + idMascota;
}

function procedimientoVeterinario() {
    var idMascota = $("#id").val();
    window.location = '../../procedimiento_veterinario/listar/listar.php?idMascota=' + idMascota;
}