$(document).ready(function () {
    
    consultarMascota();

    $("#btnActualizar").click(function () {
        guadar();
    });
    
    function consultarMascota() {
        $.ajax({
            url: "../../../controller/CapturaInformacionController.php",
            type: "POST",
            datatype: "xml",
            data: ({
                'metodo': 'consultarPerfil',
                'idUsuario': $("#idUsuario").val()
            }),
            success: function (xml) {
                $(xml).find('registro').each(function () {
                    if ($(this).text() == 'NOEXITOSO') {
                    } else {
                        $("#nombre").val($(this).attr('NombreCompleto'));
                        $("#genero").val($(this).attr('Genero'));
                        $("#edad").val($(this).attr('Edad'));
                        $("#direccionResidencia").val($(this).attr('DireccionResidencia'));
                        $("#telefono").val($(this).attr('Telefono'));
                        $("#correoElectronico").val($(this).attr('CorreoElectronico'));
                        $("#contrasena").val($(this).attr('Clave'));
                        $("#confirmarContrasena").val($(this).attr('Clave'));
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
                'metodo': 'actualizarUsuario',
                'idUsuario': $("#idUsuario").val(),
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