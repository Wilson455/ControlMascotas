$(document).ready(function () {   
    listarMascotas(); 
    $('#listarMascotas').DataTable({
        destroy: true,
        ordering: false,
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

    function listarMascotas() {
       
        $.ajax({
            url: "../../../controller/CapturaInformacionController.php",
            type: "POST",
            datatype: "xml",
            async: false,
            data: ({
                'metodo': 'listarMascotas',
                'idUsuario': $("#idUsuario").val(),
            }),
            success: function (xml) {
                $(xml).find('registro').each(function () {
                    if ($(this).text() == 'NOEXITOSO') {
                        $("#listarMascotas").dataTable().fnClearTable();
                    } else {
                        $("#listarMascotas").dataTable({destroy: true,}).fnAddData([
                            $(this).attr('Id'),
                            $(this).attr('Nombre'),
                            $(this).attr('Edad'),
                            $(this).attr('Tipo'),
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

function editar(idMascota) {
    window.location = '../actualizar/actualizar.php?idMascota=' + idMascota;
}