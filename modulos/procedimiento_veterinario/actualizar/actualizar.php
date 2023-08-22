<?php
ini_set('set_time_limit', 0);
session_start();
if (!isset($_SESSION['Usuario'])) {
    //si no existe usuario
    header('Location: ../../../pages/AccesoDenegado.php');
}else{
    if ($_REQUEST['idProcedimientoVeterinario'] != null) {
        $_SESSION['idProcedimientoVeterinario'] = $_REQUEST['idProcedimientoVeterinario'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar Procedimiento Veterinario</title>
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />                        
        <link href="../../../css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../css/datepicker.css" rel="stylesheet" type="text/css"/>   
        <link href="../../../css/AdminLTE.css" rel="stylesheet" type="text/css" />      
        <script type="text/javascript" src="../../../js/jquery1.9.js"></script>            
        <script type="text/javascript" src="../../../js/jquery.numeric.js"></script>
        <script src="../../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../../js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../js/bootbox.min.js" type="text/javascript"></script>
        <script src="js/actualizar.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container" id="datoscliente">
            <div class="row">
                <div style="text-align: center;">
                    <div class="page-header">
                        <h2>Actualizar Procedimiento Veterinario #<?php echo $_SESSION['idProcedimientoVeterinario']; ?></h2>
                    </div>
                </div>
            </div>
            <input type="hidden" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
            <input type="hidden" id="idMascota" value="<?php echo $_SESSION['idMascota']; ?>">
            <input type="hidden" id="id" value="<?php echo $_SESSION['idProcedimientoVeterinario']; ?>">
            <div class="row">
                <form>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombreProcedimiento">Nombre del Procedimiento</label>
                                <input type="text" class="form-control" id="nombreProcedimiento" placeholder="Ingrese el nombre del procedimiento" style="border-radius: 0.5rem !important;">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="fechaProcedimiento">Fecha del Procedimiento</label>
                                <input type="text" class="form-control" id="fechaProcedimiento" placeholder="Ingrese la fecha del procedimiento" style="border-radius: 0.5rem !important;">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="resultadoExamen">Resultado del Examen</label>
                                <input type="text" class="form-control" id="resultadoExamen" placeholder="Ingrese el resultado del examen" style="border-radius: 0.5rem !important;">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tratamiento">Tratamiento</label>
                                <input type="text" class="form-control" id="tratamiento" placeholder="Ingrese los tratamiento" style="border-radius: 0.5rem !important;">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recomendacionesPertinentes">Recomendaciones Pertinentes</label>
                                <input type="text" class="form-control" id="recomendacionesPertinentes" placeholder="Ingrese los recomendaciones pertinentes" style="border-radius: 0.5rem !important;">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="col-md-12" style="text-align: center;">
                        <div class="form-group">
                            <button class="btn btn-success" id="btnGuardar">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
}
?>