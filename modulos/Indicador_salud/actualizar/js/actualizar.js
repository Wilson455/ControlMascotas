$(document).ready(function () {
    
    consultarIndicadorSalud();

    $("#btnGuardar").click(function () {
        guadar();
    });

    function consultarIndicadorSalud() {
        $.ajax({
            url: "../../../controller/CapturaInformacionController.php",
            type: "POST",
            datatype: "xml",
            data: ({
                'metodo': 'consultarIndicadorSalud',
                'idIndicadorSalud': $("#id").val()
            }),
            success: function (xml) {
                $(xml).find('registro').each(function () {
                    if ($(this).text() == 'NOEXITOSO') {
                        $("#peso").val("");
                        $("#fechaVacunacion").val("");
                        $("#otrosValores").val("");
                    } else {
                        $("#peso").val($(this).attr('Peso'));
                        $("#fechaVacunacion").val($(this).attr('FechaVacunacion'));
                        $("#otrosValores").val($(this).attr('OtrosValores'));
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
                'metodo': 'actualizarIndicadorSalud',
                'peso': $("#peso").val(),
                'fechaVacunacion': $("#fechaVacunacion").val(),
                'otrosValores': $("#otrosValores").val(),
                'idIndicadorSalud': $("#id").val(),
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