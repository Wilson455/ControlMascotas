$(document).ready(function () {
    
    consultarMascota();
    
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
});