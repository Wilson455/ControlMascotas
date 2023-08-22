$(document).ready(function () {
    
    consultarControlMedico();

    $("#btnGuardar").click(function () {
        guadar();
    });

    function consultarControlMedico() {
        $.ajax({
            url: "../../../controller/CapturaInformacionController.php",
            type: "POST",
            datatype: "xml",
            data: ({
                'metodo': 'consultarControlMedico',
                'idControlMedico': $("#id").val()
            }),
            success: function (xml) {
                $(xml).find('registro').each(function () {
                    if ($(this).text() == 'NOEXITOSO') {
                        $("#nombre").val("");
                        $("#fecha").val("");
                        $("#diagnostico").val("");
                        $("#observaciones").val("");
                    } else {
                        $("#nombre").val($(this).attr('NombreProfesional'));
                        $("#fecha").val($(this).attr('Fecha'));
                        $("#diagnostico").val($(this).attr('Diagnostico'));
                        $("#observaciones").val($(this).attr('Observaciones'));
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
                'metodo': 'actualizarControlMedico',
                'nombre': $("#nombre").val(),
                'fecha': $("#fecha").val(),
                'diagnostico': $("#diagnostico").val(),
                'observaciones': $("#observaciones").val(),
                'idControlMedico': $("#id").val(),
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