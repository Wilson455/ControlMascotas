$(document).ready(function () {
    
    consultarMascota();
    
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