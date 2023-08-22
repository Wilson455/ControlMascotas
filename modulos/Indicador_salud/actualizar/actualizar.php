<?php
ini_set('set_time_limit', 0);
session_start();
if (!isset($_SESSION['Usuario'])) {
    //si no existe usuario
    header('Location: ../../../pages/AccesoDenegado.php');
}else{
    if ($_REQUEST['idIndicadorSalud'] != null) {
        $_SESSION['idIndicadorSalud'] = $_REQUEST['idIndicadorSalud'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar Indicador De Salud</title>
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
        <input type="hidden" id="id" value="<?php echo $_SESSION['idIndicadorSalud']; ?>">
        <div class="container" id="datoscliente">
            <div class="row">
                <div style="text-align: center;">
                    <div class="page-header">
                        <h2>Actualizar Indicador De Salud #<?php echo $_SESSION['idIndicadorSalud']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <form>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="peso">Peso</label>
                                <input type="text" class="form-control" id="peso" placeholder="Ingrese el peso" style="border-radius: 0.5rem !important;">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="fechaVacunacion">Fecha De Vacunación</label>
                                <input type="text" class="form-control" id="fechaVacunacion" placeholder="Ingrese la fecha de vacunación" style="border-radius: 0.5rem !important;">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="otrosValores">Otros Valores</label>
                                <input type="text" class="form-control" id="otrosValores" placeholder="Ingrese el otros valores" style="border-radius: 0.5rem !important;">
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