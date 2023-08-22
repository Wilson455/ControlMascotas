$(document).ready(function () {
    $("#btnGuardar").click(function () {
        guadar();
    });

    function guadar() {
        $.ajax({
            url: "../../../controller/CapturaInformacionController.php",
            type: "POST",
            datatype: "xml",
            async: true,
            data: ({
                'metodo': 'usuario',
                'nombre': $("#nombre").val(),
                'genero': $("#genero").val(),
                'edad': $("#edad").val(),
                'direccionResidencia': $("#direccionResidencia").val(),
                'telefono': $("#telefono").val(),
                'correoElectronico': $("#correoElectronico").val(),
                'contrasena': $("#contrasena").val(),
                'confirmarContrasena': $("#confirmarContrasena").val(),
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
                            message: '<table align="center"><tr><td>Error</td></tr><tr><td>Error al guardar.</td></tr></table>',
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
                        console.log("Guardado");
                        alert("Se ha guardado Correctamente");
                        bootbox.dialog({
                            message: '<table align="center"><tr><td>Se ha guardado Correctamente</td></tr></table>',
                            title: "Guardado",
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