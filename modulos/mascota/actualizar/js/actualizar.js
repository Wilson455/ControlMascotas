$(document).ready(function () {
    
    consultarMascota();
    
    $("#btnGuardar").click(function () {
        guadar();
    });

    $("#btnControlMedico").click(function () {
        controlMedico();
    });

    $("#btnProcedimientoVeterinario").click(function () {
        procedimientoVeterinario();
    });

    $("#btnIndicadorSalud").click(function () {
        indicadorSalud();
    });

    $("#btnCondicionSalud").click(function () {
        condicionSalud();
    });

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

    function guadar() {
        $.ajax({
            url: "../../../controller/CapturaInformacionController.php",
            type: "POST",
            datatype: "xml",
            async: true,
            data: ({
                'metodo': 'actualizarMascota',
                'nombre': $("#nombre").val(),
                'edad': $("#edad").val(),
                'tipo': $("#tipo").val(),
                'rasgosFisicos': $("#rasgosFisicos").val(),
                'tipoAlimento': $("#tipoAlimento").val(),
                'idMascota': $("#id").val(),
            }),
            beforeSend: function () {
                bootbox.dialog({
                    message: '<table align="center"><tr><td>Cargando...</td></tr><tr><td><img src="../../../imagenes/Cargando.gif"/></td></tr></table>',
                    title: "Cargando"
                });
            },
            success: function (xml) {
                bootbox.hideAll();
                $(xml).find('registro').each(function () {
                    if ($(this).text() == 'NOEXITOSO') {
                        bootbox.dialog({
                            message: '<table align="center"><tr><td>Error</td></tr><tr><td>Error al actualizar.</td></tr></table>',
                            title: "Error",
                            buttons: {
                                main: {
                                    label: "Aceptar",
                                    className: "btn-primary",
                                    callback: function () {

                                    }
                                }
                            }
                        });
                    } else {
                        console.log("Actualizado");
                        alert("Se ha actualizado Correctamente");
                        bootbox.dialog({
                            message: '<table align="center"><tr><td>Se ha actualizado Correctamente</td></tr></table>',
                            title: "Actualizado",
                            buttons: {
                                main: {
                                    label: "Aceptar",
                                    className: "btn-primary",
                                    callback: function () {
                                        location.href = '';
                                    }
                                }
                            }
                        });
                    }
                });
            }
        });
    }

    function controlMedico() {
        window.location = '../../control_medico/listar/listar.php';
    }
    
    function procedimientoVeterinario() {
        window.location = '../../procedimiento_veterinario/listar/listar.php';
    }

    function indicadorSalud() {
        window.location = '../../indicador_salud/listar/listar.php';
    }

    function condicionSalud() {
        window.location = '../../condicion_salud/listar/listar.php';
    }
});