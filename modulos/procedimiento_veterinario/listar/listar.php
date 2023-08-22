<?php
ini_set('set_time_limit', 0);
session_start();
if (!isset($_SESSION['Usuario'])) {
    //si no existe usuario
    header('Location: ../../../pages/AccesoDenegado.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Procedimiento Veterinario</title>
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
        <script src="js/listar.js" type="text/javascript"></script>
    </head>
    <body>
        <input type="hidden" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
        <input type="hidden" id="idMascota" value="<?php echo $_SESSION['idMascota']; ?>">
        <div class="container">
            <div class="row">
                <div style="text-align: center;">
                    <div class="page-header">
                        <h2>Procedimientos Veterinarios Para La Mascota #<?php echo $_SESSION['idMascota'];?></h2>
                    </div>
                </div>
            </div>
            <div style="margin: auto;text-align: center;width:50%;">
                <table id="listarProcedimientoVeterinario" class="table table-striped example" style="width:100%; margin: auto;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre del Procedimiento</th>
                            <th>Fecha del Procedimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody >
                    </tbody>
                </table>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <div class="form-group">
                        <button class="btn btn-success" onclick="registrar()" id="btnRegistrar">Registrar Procedimiento</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
}
?>