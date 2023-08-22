$(document).ready(function () {
    
    consultarProcedimientoVeterinario();

    $("#btnGuardar").click(function () {
        guadar();
    });

    function consultarProcedimientoVeterinario() {
        $.ajax({
            url: "../../../controller/CapturaInformacionController.php",
            type: "POST",
            datatype: "xml",
            data: ({
                'metodo': 'consultarProcedimientoVeterinario',
                'idProcedimientoVeterinario': $("#id").val()
            }),
            success: function (xml) {
                $(xml).find('registro').each(function () {
                    if ($(this).text() == 'NOEXITOSO') {
                        $("#nombreProcedimiento").val("");
                        $("#fechaProcedimiento").val("");
                        $("#resultadoExamen").val("");
                        $("#tratamiento").val("");
                        $("#recomendacionesPertinentes").val("");
                    } else {
                        $("#nombreProcedimiento").val($(this).attr('NombreProcedimiento'));
                        $("#fechaProcedimiento").val($(this).attr('FechaProcedimiento'));
                        $("#resultadoExamen").val($(this).attr('ResultadoExamen'));
                        $("#tratamiento").val($(this).attr('Tratamiento'));
                        $("#recomendacionesPertinentes").val($(this).attr('RecomendacionesPertinentes'));
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
                'metodo': 'actualizarProcedimientoVeterinario',
                'nombre': $("#nombreProcedimiento").val(),
                'fecha': $("#fechaProcedimiento").val(),
                'resultadoExamen': $("#resultadoExamen").val(),
                'tratamiento': $("#tratamiento").val(),
                'recomendacionesPertinentes': $("#recomendacionesPertinentes").val(),
                'idProcedimientoVeterinario': $("#id").val(),
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
});