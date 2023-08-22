<?php
ini_set('set_time_limit', 0);
session_start();
if (!isset($_SESSION['Usuario'])) {
    //si no existe usuario
    header('Location: ../../../pages/AccesoDenegado.php');
}else{
    if (!isset($_SESSION['idControlMedico'])) {
        $_SESSION['idControlMedico'] = $_REQUEST['idControlMedico'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar Control Medico</title>
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
        <input type="hidden" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
        <input type="hidden" id="idMascota" value="<?php echo $_SESSION['idMascota']; ?>">
        <input type="hidden" id="id" value="<?php echo $_SESSION['idControlMedico']; ?>">
        <div class="container" id="datoscliente">
            <div class="row">
                <div style="text-align: center;">
                    <div class="page-header">
                        <h2>Actualizar Control Medico #<?php echo $_SESSION['idControlMedico']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre del Profesional</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del profesional" style="border-radius: 0.5rem !important;">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="text" class="form-control" id="fecha" placeholder="Ingrese la fecha" style="border-radius: 0.5rem !important;">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diagnostico">Diagnostico</label>
                                <input type="text" class="form-control" id="diagnostico" placeholder="Ingrese el diagnostico" style="border-radius: 0.5rem !important;">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="observaciones">Observaciones</label>
                                <input type="text" class="form-control" id="observaciones" placeholder="Ingrese los observaciones" style="border-radius: 0.5rem !important;">
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